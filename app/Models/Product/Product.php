<?php

namespace App\Models\Product;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public $timestamps = false;

    protected $guarded = [];

    public function translation(){

        return $this->hasMany('App\Models\Product\ProductTranslate');
    }
    public function tr(){

        return $this->hasOne('App\Models\Product\ProductTranslate')
            ->where('locale','=',app()->getLocale());
    }

    public function images(){

        return $this->hasMany('App\Models\Product\ProductImage');
    }
    public function category(){

        return $this->belongsTo('App\Models\Category\SubCategory','category_id');
    }

    public function branch(){

        return $this->belongsTo('App\Models\Shop\ShopBranch','shop_branch_id');
    }

    public function options(){

        return $this->hasMany('App\Models\Product\ProductOption')->where('custom_option',0);
    }
}
