<?php

namespace App\Models\Product;

use Illuminate\Database\Eloquent\Model;

class ProductOption extends Model
{
    public $timestamps = false;

    protected $guarded = [];

    public function values(){

        return $this->hasMany('App\Models\Product\ProductOptionValue');
    }

    public function image(){

        return $this->belongsTo('App\Models\Product\ProductImage','product_image_id');
    }

    public function custom_options(){

        return $this->hasOne('App\Models\Product\CustomOptionValue','product_option_id');
    }


}
