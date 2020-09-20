<?php
namespace App\Repositories\V1\Panel\Shop;

use App\Models\Brand\Brand;
use App\Models\Category\Category;
use App\Models\Product\CustomOption;
use App\Models\Product\CustomOptionValue;
use App\Models\Product\CustomValue;
use App\Models\Product\Product;
use App\Models\Product\ProductImage;
use App\Models\Product\ProductOption;
use App\Models\Shop\Shop;
use App\Models\Shop\ShopBranch;
use App\Repositories\V1\Panel\Shop\Interfaces\ProductRepositoryInterface;
use Illuminate\Support\Str;

class ProductRepository implements ProductRepositoryInterface
{
    private $model;
    private $model_shop;
    private $model_image;
    private $model_productOption;
    private $model_customOption;
    private $model_customOptionValue;
    private $model_shopBranch;
    private $branch_id = null;
    private $shop_branches_ids = null;
    private $shop_id = null;


    protected $searchable = ['shop_id','shop_branch_id','stock','id'];

    public function __construct(
        Product $product,
        Shop $shop,
        ProductImage $productImage,
        ProductOption $productOption,
        CustomOption $customOption,
        CustomOptionValue $customOptionValue,
        ShopBranch $shopBranch
    )
    {
        $this->model = $product;
        $this->model_shop = $shop;
        $this->model_image = $productImage;
        $this->model_productOption = $productOption;
        $this->model_customOption = $customOption;
        $this->model_customOptionValue = $customOptionValue;
        $this->model_shopBranch = $shopBranch;

        if( $user = auth('shop_user')->user() ){
            if($user->shop_id){
                $shop = $this->model_shop->findOrFail($user->shop_id);
                $shop_branches_ids = $shop->branches->pluck('id')->toArray();

                $this->shop_id = $user->shop_id;
                $this->shop_branches_ids = $shop_branches_ids;
            }else{
                $this->branch_id = $user->branch_id;
            }
        }
    }
    public function all()
    {
        if($this->branch_id){
            $query = $this->model::where('shop_branch_id',$this->branch_id );
        }else {
            $query = $this->model::whereIn('shop_branch_id',$this->shop_branches_ids);
        }

        return  $query->with(['translation','category.tr','branch'])->orderBy('id','desc')
            ->paginate(10);
    }

    public function search()
    {
        if($this->branch_id){
            $query = $this->model::where('shop_branch_id',$this->branch_id );
        }else {
            $query = $this->model::whereIn('shop_branch_id',$this->shop_branches_ids);
        }

        $products = $query::with(['translation','category.tr','branch'])->orderBy('id','desc');

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

        if( ! in_array($request['shop_branch_id'],$this->shop_branches_ids) ){
            return response()->json([ 'message' => 'Bu əməliyyatı edə bilməzsiniz','status' => 'failed' ],400);
        }

        //Create product
        $product = Product::create(array_merge(
            $request->only('sku', 'category_id', 'brand_id', 'price', 'new_price', 'weight', 'stock', 'shop_branch_id'),
            ['slug' =>Str::slug(request('name')['az'])]
        ));

        $product->translation()->createMany(array_map(function ($locale,$name){

            return array(
                'locale' =>$locale,
                'name' => $name,
                'description' => request('description')[$locale]
            );

        },array_keys($request->name),$request->name));

        //Update product_id in images
        $this->model_image->whereIn('id',$request['images'])->whereNull('product_id')->update(['product_id' => $product->id]);

        //Create product options
        foreach ($request['options'] as $option) {

            $this->create_option($option,$product);
        }
        //Create product custom options
        foreach ($request['custom_options'] as $custom_option) {

            $this->create_custom_option($custom_option,$product);
        }

        return $product;

    }

    public function update_product($request,$product_id)
    {

        if( ! in_array($request['shop_branch_id'],$this->shop_branches_ids) ){
            return response()->json([ 'message' => 'Bu əməliyyatı edə bilməzsiniz','status' => 'failed' ],400);
        }

        $product_data = array_merge(
            $request->only('sku', 'category_id', 'brand_id', 'price', 'new_price', 'weight', 'stock', 'shop_branch_id'),
            ['slug' =>Str::slug(request('name')['az'])]
        );
        $product = $this->model->find($product_id);
        $product->update($product_data);

        foreach (config('app.site_languages') as $lang){

            $product->translation()->updateOrCreate(
                [ 'locale' => $lang ],
                [ 'name' => $request->name[$lang], 'description' => $request->description[$lang] ]
            );
        };

        //Update product options
        foreach ($request['options'] as $option) {

            if($option->id){
                $this->update_option($option,$product);
            }
            else{
                $this->create_option($option,$product);
            }
        }
        //Update custom product option
        foreach ($request['custom_options'] as $custom_option) {

            if($custom_option->id){
                $this->update_custom_option($custom_option);
            }else{
                $this->create_custom_option($custom_option,$product);
            }
        }


        return $product->load('translation');
    }


    public function findProductById($id)
    {
        return $this->model->with(array(
            'options.custom_options',
            'options.values.options.tr',
            'options.values.values.tr',
            'translation',
            'images',
            'category.main_category.tr',
            'branch' => function($q){
                $q->select('id','name');
        }))->find($id);
    }

    public function findProductOptions($product_id)
    {
        return ProductOption::where('product_id',$product_id)->where('custom_option',0)
            ->with('image','values.options.translation','values.values.translation')
            ->get();
    }
    public function create_custom_option($custom_option,$product){

        $product_option = $this->model_productOption->create([
            'product_image_id' => $custom_option['product_image_id'],
            'price' => $custom_option['price'],
            'product_id' => $product->id,
            'custom_option' => 1
        ]);

        $custom_opt = $this->model_customOption->create(['field_type' => $custom_option['field_type']]);

        $custom_opt->translation()->createMany(

            array_map(function ($key,$value){

                return array('locale' =>$key,'name' => $value);

            },array_keys($custom_option['name']),$custom_option['name'])
        );

        $custom_value = $custom_opt->values()->create();

        $custom_value->translation()->createMany(

            array_map(function ($key,$value){

                return array('locale' =>$key,'name' => $value);

            },array_keys($custom_option['value']),$custom_option['value'])
        );

        $this->model_customOptionValue->create([
            'product_option_id' => $product_option->id,
            'custom_option_id' => $custom_opt->id,
            'custom_value_id' => $custom_value->id,
        ]);
    }

    public function update_custom_option($custom_option){

        $this->model_productOption->update([
            'product_image_id' => $custom_option['product_image_id'],
            'price' => $custom_option['price'],
        ]);

        $custom_opt = $this->model_customOption->find($custom_option->id)->create(['field_type' => $custom_option['field_type']]);

        foreach (config('app.site_languages') as $lang){

            $custom_opt->translation()->updateOrCreate(
                [ 'locale' => $lang ],
                [ 'name' => $custom_option->name[$lang], ]
            );

            $custom_opt->translation()->updateOrCreate(
                [ 'locale' => $lang ],
                [ 'name' => $custom_option->value[$lang], ]
            );
        };
    }

    public function create_option($option,$product){

        $product_option = $this->model_productOption->create([
            'product_image_id' => $option['product_image_id'],
            'price' => $option['price'],
            'product_id' => $product->id,
            'custom_option' => 0
        ]);

        $product_option->values()->create([ 'option_id' => $option['option_id'], 'value_id' => $option['value_id'] ]);
    }

    public function update_option($option,$product){

        $product_option = $this->model_productOption->find($option->id)->update([
            'product_image_id' => $option['product_image_id'],
            'price' => $option['price'],
            'product_id' => $product->id,
            'custom_option' => 0
        ]);

        $product_option->values()->update([ 'option_id' => $option['option_id'], 'value_id' => $option['value_id'] ]);
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

    public function get_shops_branches($shop)
    {
        return $this->model_shopBranch->select('id','name')->where('shop_id',auth('shop_user')->user()->shop_id)->get();
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
