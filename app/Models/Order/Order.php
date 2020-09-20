<?php

namespace App\Models\Order;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $guarded = [];

    public function user(){
        return $this->belongsTo('App\Models\User\User');
    }

    public function shop_branch(){
        return $this->belongsTo('App\Models\Shop\ShopBranch');
    }

    public function user_address(){
        return $this->belongsTo('App\Models\User\UserAddress','user_address_id');
    }

    public function status(){
        return $this->belongsTo('App\Models\Order\OrderStatus');
    }

    public function cart(){
        return $this->belongsTo('App\Models\Order\Cart');
    }

    public function payment(){
        return $this->belongsTo('App\Models\Order\OrderPaymentMethod','payment_method');
    }

    public function courier(){
        return $this->belongsTo('App\Models\DeliveryCompany\Courier','courier_id');
    }

    public function total_amount(){
        $total_amount = null;
       foreach ( $this->cart->cart_items as $cart_item ){
           $total_amount += $cart_item->cart_product->product()->price;
       }
       return number_format($total_amount + $this->delivery_cost, 2);
    }

    public function basket_amount(){
        $total_amount = null;
        foreach ( $this->cart->cart_items as $cart_item ){
            $total_amount += $cart_item->cart_product->product()->price;
        }
        return number_format($total_amount , 2);
    }
}
