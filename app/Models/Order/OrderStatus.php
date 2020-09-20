<?php

namespace App\Models\Order;

use Illuminate\Database\Eloquent\Model;

class OrderStatus extends Model
{
    public $timestamps = false;

    protected $guarded = [];

    public function tr(){

        return $this->hasOne('App\Models\Order\OrderStatusTranslate','status_id')
            ->where('locale','=',app()->getLocale());
    }
}
