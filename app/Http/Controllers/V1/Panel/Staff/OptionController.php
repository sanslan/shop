<?php

namespace App\Http\Controllers\V1\Panel\Staff;

use App\Http\Controllers\Controller;
use App\Http\Requests\V1\Panel\Staff\StoreOption;
use App\Http\Requests\V1\Panel\Staff\StoreOptionValue;
use App\Http\Requests\V1\Panel\Staff\UpdateOption;
use App\Http\Requests\V1\Panel\Staff\UpdateOptionValue;
use App\Models\Category\SubCategory;
use App\Models\Product\Option;
use App\Models\Product\OptionFieldType;
use App\Models\Product\OptionValue;

class OptionController extends Controller
{
    /**
     * Display a listing of the options.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $options = Option::with(['translation','type'])->paginate(10);

        return response()->json(['data' => $options,'status' => 'success']);
    }

    /**
     * Display category options.
     *
     * @param SubCategory $subCategory
     * @return \Illuminate\Http\JsonResponse
     */
    public function get_sub_category_options(SubCategory $subCategory)
    {
        $options = $subCategory->options();

        return response()->json(['data' => $options,'status' => 'success']);
    }

    /**
     * Display option values.
     *
     * @param Option $option
     * @return \Illuminate\Http\JsonResponse
     */
    public function get_option_values(Option $option)
    {
        return $option->options_with_name();
        $options = $subCategory->options();

        return response()->json(['data' => $options,'status' => 'success']);
    }




    /**
     * Store a newly created option in storage.
     *
     * @param  StoreOption $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(StoreOption $request)
    {

        $option = Option::create($request->only(['field_type','filterable','subcategory_id']));

        $option->translation()->createMany(

            array_map(function ($key,$value){

                return array('locale' =>$key,'name' => $value);

            },array_keys($request->name),$request->name)
        );

        return response()->json(['data' => $option,'status' => 'success']);
    }

    /**
     * Display the specified option.
     *
     * @param  Option $option
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(Option $option)
    {
        $option->load(['translation','values','values.translation','type']);

        return response()->json(['data' => $option,'status' => 'success']);
    }

    /**
     * Update the specified option in storage.
     *
     * @param  UpdateOption  $request
     * @param  Option  $option
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(UpdateOption $request, Option $option)
    {

        $option->update($request->only(['field_type','filterable','subcategory_id']));

        foreach (array_filter(request()->name) as $locale => $name){

            $option->translation()->updateOrCreate(

                ['locale' => $locale],
                ['name' => $name,'locale' => $locale]
            );

        }

        $option->load('translation');

        return response()->json(['data' => $option,'status' => 'success']);
    }

    /**
     * Create option value.
     *
     * @param  StoreOptionValue  $request
     * @param  Option  $option
     * @return \Illuminate\Http\JsonResponse
     */
    public function option_values_create(StoreOptionValue $request, Option $option)
    {
        if($request->value){
            $option_value = $option->values()->create();
        }

        foreach ($request->value as $locale => $name){

            $option_value->translation()->create([ 'locale' => $locale, 'name' => $name]);
        }

        $option_value->load(['translation']);


        return response()->json(['data' => $option_value,'status' => 'success']);
    }

    /**
     * Update the specified option in storage.
     *
     * @param  UpdateOptionValue  $request
     * @param  Option  $option
     * @return \Illuminate\Http\JsonResponse
     */
    public function option_values_update(UpdateOptionValue $request, Option $option)
    {

        $option_value = OptionValue::find(request('value')['option_value_id']);
        $translations =  request('value')['tr'];

        foreach ($translations as $locale => $name){

            $option_value->translation()->updateOrCreate(
                ['locale' => $locale],
                [ 'locale' => $locale, 'name' => $name]
            );
        }

        $option_value->load(['translation']);

        return response()->json(['data' => $option_value,'status' => 'success']);
    }

    /**
     * Display option types.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function get_option_types()
    {
        $option_types = OptionFieldType::all();

        return response()->json(['data' => $option_types,'status' => 'success']);
    }

    /**
     * Display sub categories.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function get_sub_categories()
    {
        $sub_categories = SubCategory::select('id')->with('tr:sub_category_id,name')->get()
            ->map(function ($sub_category){
                return [
                    'id' => $sub_category->id,
                    'name' => $sub_category->tr ? $sub_category->tr->name : null,
                ];
            });

        return response()->json(['data' => $sub_categories,'status' => 'success']);
    }

    /**
     * Remove the specified option from storage.
     *
     * @param  Option  $option
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(Option $option)
    {
        $option->translation()->delete();
        $option->values()->each(function($translation){
            $translation->delete();
        });
        $option->values()->delete();
        return response()->json(['status' => 'success'],200);
    }

    /**
     * Remove option value and its translations
     *
     * @param  OptionValue  $option_value
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy_option_value(OptionValue $option_value)
    {
        $option_value->translation()->delete();
        $option_value->delete();
        return response()->json(['status' => 'success'],200);
    }
}
