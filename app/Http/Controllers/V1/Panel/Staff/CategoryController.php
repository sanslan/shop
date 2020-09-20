<?php

namespace App\Http\Controllers\V1\Panel\Staff;

use App\Http\Controllers\Controller;
use App\Http\Requests\V1\Panel\Staff\StoreCategory;
use App\Http\Requests\V1\Panel\Staff\UpdateCategory;
use App\Models\Category\Category;
use App\Models\Category\CategoryTranslate;

class CategoryController extends Controller
{
    /**
     * Display a listing of the categories.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $categories =  Category::with('translation')->paginate(10);

        return response()->json(['data' => $categories,'status' => 'success']);
    }

    /**
     * Display the specified category.
     *
     * @param  object $category
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(Category $category)
    {
        $category->load(['translation','sub']);
        $category->sub->load('translation');
        return response()->json(['data' => $category,'status' => 'success']);
    }



    /**
     * Store a newly created category in storage.
     *
     * @param  StoreCategory  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(StoreCategory $request)
    {

        $data_category = [];
        $data_category = store_files(['icon','cover'],$data_category,'categories');

        $category = Category::create($data_category);
        $category->translation()->saveMany($this->translation(request()->name));
        $category->load('translation');

        return response()->json(['data' => $category,'status' => 'success'],201);
    }


    /**
     * Update the specified category in storage.
     *
     * @param  UpdateCategory  $request
     * @param  object  $category
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(UpdateCategory $request, Category $category)
    {
        $data_category = [];
        $data_category = store_files(['icon','cover'],$data_category,'categories',$category);

        $category->update($data_category);

        //Update category translations
        foreach (request()->name as $locale => $name){
            if($name){
                $cat = CategoryTranslate::where('category_id',$category->id);
                if($cat->where('locale',$locale)->exists()){
                    $cat->update(['name' => $name]);
                }else{
                    $cat->create(['name' => $name,'locale' => $locale,'category_id' => $category->id]);
                }
            }
        }
        $category->load('translation');
        return response()->json(['data' => $category,'status' => 'success'],200);
    }

    /**
     * Remove the specified category from storage.
     *
     * @param  object  $category
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(Category $category)
    {
        $category->translation()->delete();
        $category->delete();
        return response()->json(['status' => 'success'],200);
    }

    private function translation($translates){

        if(!$translates) return array();
        $new_translates = [];
        foreach ($translates as $locale => $name){
            if($name){

                $new_translates[] = new CategoryTranslate(
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
