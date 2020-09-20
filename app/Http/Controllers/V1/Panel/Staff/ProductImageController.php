<?php

namespace App\Http\Controllers\V1\Panel\Staff;

use App\Http\Controllers\Controller;
use App\Http\Requests\V1\Panel\Staff\UploadProductImage;
use App\Models\Product\ProductImage;

class ProductImageController extends Controller
{

    /**
     * Store a newly created image in storage.
     *
     * @param  UploadProductImage $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function upload(UploadProductImage $request)
    {
        $file =  store_product_file('file');
        $image = ProductImage::create([
            'file_name' => $file,
            'file_directory' => $file,
            'disk' => $file,
            'product_id' => $request->product_id
        ]);

        return response()->json(['data' => $image,'status' => 'success']);
    }

}
