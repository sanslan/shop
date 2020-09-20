<?php

namespace App\Http\Controllers\V1\Panel\Staff;

use App\Http\Controllers\Controller;
use App\Http\Requests\V1\Panel\Staff\StoreSubCategory;
use App\Http\Requests\V1\Panel\Staff\UpdateSubCategory;
use App\Models\Category\Category;
use App\Models\Category\SubCategory;
use App\Models\Category\SubCategoryTranslate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SubCategoryController extends Controller
{

    /**
     * Display the specified sub categories.
     *
     * @param  SubCategory $sub_category
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(SubCategory $sub_category)
    {
        $sub_category->load(['translation','sub']);
        $sub_category->sub->load('translation');
        return response()->json(['data' => $sub_category,'status' => 'success']);
    }

    /**
     * Store a newly created sub category in storage.
     *
     * @param  StoreSubCategory $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(StoreSubCategory $request)
    {
        $data_sub_category = request()->only(['category_id','parent_id']);
        $data_sub_category = store_files(['icon','cover'],$data_sub_category,'categories');

        if( !request('category_id') ){
            $category_id = SubCategory::find(request('parent_id'))->category_id;
            $data_sub_category = array_merge($data_sub_category,['category_id' => $category_id ]);
        }

        $sub_category = SubCategory::create($data_sub_category);
        $sub_category->translation()->saveMany($this->translation(request()->name));
        $sub_category->load('translation');

        return response()->json(['data' => $sub_category,'status' => 'success'],201);
    }


    /**
     * Update the specified sub category in storage.
     *
     * @param  UpdateSubCategory $request
     * @param  SubCategory $subcategory
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(UpdateSubCategory $request, SubCategory $subcategory)
    {
        $data_sub_category = request()->only(['category_id','parent_id']);

        $data_sub_category = store_files(['icon','cover'],$data_sub_category,'categories',$subcategory);

        $subcategory->update($data_sub_category);

        foreach (request()->name as $locale => $name){
            if($name){
                $cat = SubCategoryTranslate::where('sub_category_id',$subcategory->id);
                if($cat->where('locale',$locale)->exists()){
                    $cat->update(['name' => $name]);
                }else{
                    $cat->create(['name' => $name,'locale' => $locale,'category_id' => $subcategory->id]);
                }
            }
        }
        return response()->json(['data' => $subcategory,'status' => 'success'],200);
    }

    /**
     * Remove the specified sub category from storage.
     *
     * @param  SubCategory $subcategory
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(SubCategory $subcategory)
    {
        $subcategory->translation()->delete();
        $subcategory->delete();
        return response()->json(['status' => 'success'],200);
    }

    private function translation($translates){

        if(!$translates) return array();
        $new_translates = [];
        foreach ($translates as $locale => $name){
            if($name){

                $new_translates[] = new SubCategoryTranslate(
                    [
                        'locale' => $locale,
                        'name' => $name
                    ]
                );
            }
        }
        return $new_translates;
    }
}
