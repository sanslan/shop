<?php

namespace App\Models\Product;

use Illuminate\Database\Eloquent\Model;

class CustomOptionValue extends Model
{
    public $timestamps = false;

    protected $guarded = [];

    public function options(){

        return $this->hasOne('App\Models\Product\CustomOption','id','custom_option_id');
    }

}
