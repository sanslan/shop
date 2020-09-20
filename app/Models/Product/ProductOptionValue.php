<?php

namespace App\Models\Product;

use Illuminate\Database\Eloquent\Model;

class ProductOptionValue extends Model
{
    public $timestamps = false;

    protected $guarded = [];

    public function options(){

        return $this->belongsTo('App\Models\Product\Option','option_id','id');
    }

    public function values(){

        return $this->belongsTo('App\Models\Product\OptionValue','value_id','id');
    }
}
