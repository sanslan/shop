<?php
namespace App\Repositories\V1\Panel\Staff;

use App\Models\Brand\Brand;
use App\Models\Category\Category;
use App\Models\Category\SubCategory;
use App\Models\Product\CustomOption;
use App\Models\Product\CustomOptionValue;
use App\Models\Product\CustomValue;
use App\Models\Product\Product;
use App\Models\Product\ProductOption;
use App\Models\Shop\Shop;
use App\Models\Shop\ShopBranch;
use App\Repositories\V1\Panel\Staff\Interfaces\ProductRepositoryInterface;
use Illuminate\Support\Str;

class ProductRepository implements ProductRepositoryInterface
{
    private $model;

    protected $searchable = ['shop_id','shop_branch_id','stock','id'];

    public function __construct(Product $product)
    {
        $this->model = $product;
    }
    public function all()
    {
        return  $this->model::with(['translation','category.tr','branch'])->orderBy('id','desc')
            ->paginate(10);
    }

    public function search()
    {
        $products = $this->model::with(['translation','category.tr','branch'])->orderBy('id','desc');

        foreach (request()->all() as $filter_column => $filter_value){

            if( ! in_array( $filter_column,$this->searchable ) || ! is_int( intval($filter_value) )){
                continue;
            }
            if($filter_column == 'shop_id'){
                $shop_branches = ShopBranch::where('shop_id',$filter_value)->pluck('id');
                $products = $products->whereIn('shop_branch_id',$shop_branches);
            }else{
                $products = $products->where($filter_column,$filter_value);
            }

        }
        return $products->paginate(10);
    }

    public function create_product($request)
    {
        $product_data = array_merge(
            $request->only('sku', 'category_id', 'brand_id', 'price', 'new_price', 'weight', 'stock', 'shop_branch_id'),
            ['slug' =>Str::slug(request('name')['az'])]
        );

        $product = Product::create($product_data);

        $product->translation()->createMany(array_map(function ($locale,$name){

            return array(
                'locale' =>$locale,
                'name' => $name,
                'description' => request('description')[$locale]
            );

        },array_keys($request->name),$request->name));

        return $product;
    }

    public function create_other_branch_product($request,$product_id)
    {
        dd($product_id);
        $product_data = array_merge(
            $request->only('sku', 'category_id', 'brand_id', 'price', 'new_price', 'weight', 'stock', 'shop_branch_id'),
            ['slug' =>Str::slug(request('name')['az'])]
        );

        $product = Product::create($product_data);

        $product->translation()->createMany(array_map(function ($locale,$name){

            return array(
                'locale' =>$locale,
                'name' => $name,
                'description' => request('description')[$locale]
            );

        },array_keys($request->name),$request->name));

        return $product;
    }

    public function update_product($request,$product)
    {
        $product_data = array_merge(
            $request->only('sku', 'category_id', 'brand_id', 'price', 'new_price', 'weight', 'stock', 'shop_branch_id'),
            ['slug' =>Str::slug(request('name')['az'])]
        );
        $product->update($product_data);

        foreach (config('app.site_languages') as $lang){

            $product->translation()->updateOrCreate(
                [ 'locale' => $lang ],
                [ 'name' => $request->name[$lang], 'description' => $request->description[$lang] ]
            );
        };

        return $product->load('translation');
    }

    public function create_option($request)
    {
        $product_option = ProductOption::create($request->only('product_id','product_image_id','custom_option','price'));
        $product_option->values()->create($request->only('option_id','value_id'));
        $product_option->load('image','values.options.translation','values.values.translation');

        return $product_option;
    }

    public function create_custom_option($request)
    {
        $product_option = ProductOption::create($request->only('product_id','product_image_id','custom_option','price'));

        $custom_option = CustomOption::create($request->only(['field_type']));

        $custom_option->translation()->createMany(

            array_map(function ($key,$value){

                return array('locale' =>$key,'name' => $value);

            },array_keys($request->name),$request->name)
        );

        $custom_value = $custom_option->values()->create();

        $custom_value->translation()->createMany(

            array_map(function ($key,$value){

                return array('locale' =>$key,'name' => $value);

            },array_keys($request->value),$request->value)
        );

        CustomOptionValue::create([

            'product_option_id' => $product_option->id,
            'custom_option_id' => $custom_option->id,
            'custom_value_id' => $custom_value->id,
        ]);

        $product_option->load('image',
            'custom_options.options.type',
            'custom_options.options.translation',
            'custom_options.options.values.translation'
        );

        return $product_option;
    }

    public function findProductById($id)
    {
        return $this->model->find($id)->load('translation','images','category.main_category.tr','branch');
    }

    public function findProductOptions($product_id)
    {
        return ProductOption::where('product_id',$product_id)->where('custom_option',0)
            ->with('image','values.options.translation','values.values.translation')
            ->get();
    }

    public function findProductCustomOptions($product_id)
    {
        return ProductOption::where('product_id',$product_id)->where('custom_option','!=',0)
            ->with('image','custom_options.options.type','custom_options.options.translation','custom_options.options.values.translation')
            ->get();
    }

    public function updateProductCustomOption($request,$product_option)
    {
        $product_option->update($request->only('product_image_id','price'));

        $product_custom_option_id =  $product_option->custom_options->custom_option_id;
        $product_custom_value_id =  $product_option->custom_options->custom_value_id;
        $product_custom_option =  CustomOption::find($product_custom_option_id);
        $product_custom_value =  CustomValue::find($product_custom_value_id);

        foreach (config('app.site_languages') as $lang){

            $product_custom_option->translation()->updateOrCreate(
                [ 'locale' => $lang ],
                [ 'name' => $request->name[$lang], ]
            );

            $product_custom_value->translation()->updateOrCreate(
                [ 'locale' => $lang ],
                [ 'name' => $request->value[$lang], ]
            );
        };

        $product_custom_option->update($request->only('field_type'));

        $product_option->load('image',
            'custom_options.options.type',
            'custom_options.options.translation',
            'custom_options.options.values.translation'
        );

        return $product_option;
    }

    public function get_categories()
    {
        return Category::select('id')->with('tr:category_id,name')->get()
            ->map(function ($category){
                return [
                    'id' => $category->id,
                    'name' => $category->tr ? $category->tr->name: null,
                ];
            });
    }

    public function get_sub_categories($category)
    {
        return $category->sub()->with('children.tr','tr')->get();
    }

    public function get_sub_of_sub_categories($sub_category)
    {
        return $sub_category->sub()->select('id')->with('tr:sub_category_id,name')->get()
            ->map(function ($sub_category){
                return [
                    'id' => $sub_category->id,
                    'name' => $sub_category->tr ? $sub_category->tr->name: null,
                ];
            });
    }

    public function get_shops()
    {
        return Shop::select('id','name')->get();
    }

    public function get_shops_branches($shop)
    {
        return $shop->branches()->select(['id','name'])->get();
    }

    public function product_shops_branches($product_id)
    {
        //Get all shop_branches already exists
        $existing_shop_branches = $this->model->select('shop_branch_id')->where('id',$product_id)
            ->orWhere('ref_product',$product_id)->pluck('shop_branch_id');
        $product_shop_id =  $this->model->find($product_id)->branch->shop->id;

        $product_empty_shop_branches = ShopBranch::select('id','name')->where('shop_id',$product_shop_id)->whereNotIn('id',$existing_shop_branches)->get();

        return $product_empty_shop_branches;
    }

    public function get_brands()
    {
        return Brand::all('id','name');
    }

    public function delete_product_image($image)
    {
        delete_file($image->path_thumb);
        delete_file($image->path_main);
        $image->delete();
    }

    public function delete_product_option($product_option)
    {
        if($product_option->custom_option){

            $custom_option_value = CustomOptionValue::where('product_option_id',$product_option->id);

            $custom_option_id =  $custom_option_value->first()->custom_option_id;
            $custom_value_id =  $custom_option_value->first()->custom_value_id;

            $custom_option = CustomOption::find($custom_option_id);
            $custom_value = CustomValue::find($custom_value_id);

            $custom_option_value->delete();
            $custom_option->translation()->delete();
            $custom_value->translation()->delete();
            $custom_value->delete();
            $custom_option->delete();

        }else{

            $product_option->values()->delete();
        }

        $product_option->delete();
    }
}
