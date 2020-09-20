<?php

namespace App\Models\Order;

use Illuminate\Database\Eloquent\Model;

class CartItem extends Model
{
    public $timestamps = false;

    protected $guarded = [];

    public function cart_product(){

        return $this->belongsTo('App\Models\Order\CartProduct');
    }

}
