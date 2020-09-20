<?php

namespace App\Models\Order;

use Illuminate\Database\Eloquent\Model;

class CartProductOption extends Model
{
    public $timestamps = false;

    protected $guarded = [];

    public function product_option(){

        return $this->belongsTo('App\Models\Product\ProductOption');
    }

}
