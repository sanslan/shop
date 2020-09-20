<?php

namespace App\Models\Product;

use Illuminate\Database\Eloquent\Model;

class OptionValue extends Model
{
    public $timestamps = false;

    protected $guarded = [];

    public function translation(){

        return $this->hasMany('App\Models\Product\OptionValueTranslate','value_id');
    }

    public function tr(){

        return $this->hasOne('App\Models\Product\OptionValueTranslate','value_id')
            ->where('locale','=',app()->getLocale());
    }

}
