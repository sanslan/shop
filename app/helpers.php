<?php

use Illuminate\Http\File;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

function store_files($files,$request_data,$folder,$model=null){

    if(is_string($files)) $files = array($files);

    foreach ($files as $file){
        if(request()->hasFile($file)){
            if($model){
                Storage::disk('spaces')->delete(parse_url($model->$file,PHP_URL_PATH));
            }
            $path= Storage::disk('spaces')->putFile($folder, request()->file($file), 'public');
            $file_url =  Storage::disk('spaces')->url($path);

            $request_data = array_merge($request_data,[$file => $file_url]);
        }
    }
    return $request_data;
}

function store_product_file($file,$product_id = null){

    if(request()->hasFile($file)){

        $file = request()->file($file);
        $extension = $file->getClientOriginalExtension();
        $filename =  uniqid().md5($file->getClientOriginalName()).'.'.$extension;
        $date_path = date_folder('products');

        $sizes = ['medium' =>[600,500],'thumb' => [300,200]];
        foreach ($sizes as $name => $size){

            $image = Image::make($file)->fit($size[0],$size[1])->encode($extension);
            $path = $name == 'medium' ? $date_path.$filename : $date_path.$name.'/'.$filename;
            Storage::disk('spaces')->put($path,(string)$image, 'public');
        }
        return Storage::disk('spaces')->url($date_path. $filename);
    }
}

function delete_file($file){

    Storage::disk('spaces')->delete(parse_url($file,PHP_URL_PATH));

}

function date_folder($folder){
    return $folder. '/'.date('yy').'/'.date('m').'/'.date('d') . '/';
}
