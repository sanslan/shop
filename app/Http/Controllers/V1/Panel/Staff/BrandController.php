<?php

namespace App\Http\Controllers\V1\Panel\Staff;

use App\Http\Controllers\Controller;
use App\Http\Requests\V1\Panel\Staff\StoreBrand;
use App\Http\Requests\V1\Panel\Staff\UpdateBrand;
use App\Models\Brand\Brand;

class BrandController extends Controller
{
    /**
     * Display a listing of the brands.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $brands = Brand::paginate(10);

        return response()->json(['data' => $brands,'status' => 'success'],200);
    }


    /**
     * Store a newly created brand in storage.
     *
     * @param  StoreBrand  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(StoreBrand $request)
    {

        $data_brand = store_files('logo',$request->validated(),'brands',false);
        $brand = Brand::create($data_brand);

        return response()->json(['data' => $brand,'status' => 'success'],201);
    }

    /**
     * Display the specified brand.
     *
     * @param  Brand  $brand
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(Brand $brand)
    {
        return response()->json(['data' => $brand,'status' => 'success'],200);
    }


    /**
     * Update the specified brand in storage.
     *
     * @param  UpdateBrand  $request
     * @param  Brand $brand
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(UpdateBrand $request, Brand $brand)
    {
        $data_brand = store_files('logo',$request->validated(),'brands',$brand);
        $brand->update($data_brand);

        return response()->json(['data' => $brand,'status' => 'success'],200);
    }

    /**
     * Remove the specified brand from storage.
     *
     * @param  Brand $brand
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(Brand $brand)
    {
        delete_file($brand->logo);
        $brand->delete();
        return response()->json(['status' => 'success'],200);
    }
}
