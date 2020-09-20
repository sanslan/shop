<?php

namespace App\Models\Product;

use Illuminate\Database\Eloquent\Model;

class CustomValue extends Model
{
    public $timestamps = false;

    protected $guarded = [];

    public function translation(){

        return $this->hasMany('App\Models\Product\CustomValueTranslate','custom_value_id');
    }

    public function tr(){
        return $this->hasOne('App\Models\Product\CustomValueTranslate','custom_value_id')
            ->where('locale','=',app()->getLocale());
    }

}
