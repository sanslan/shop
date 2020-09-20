<?php

namespace App\Models\Order;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    protected $guarded = [];

    public function cart_items()
    {
        return $this->hasMany('App\Models\Order\CartItem');
    }
}
