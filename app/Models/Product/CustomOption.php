<?php

namespace App\Models\Product;

use Illuminate\Database\Eloquent\Model;

class CustomOption extends Model
{
    public $timestamps = false;

    protected $guarded = [];

    public function translation(){

        return $this->hasMany('App\Models\Product\CustomOptionTranslate');
    }

    public function tr(){

        return $this->hasOne('App\Models\Product\CustomOptionTranslate')
            ->where('locale','=',app()->getLocale());
    }

    public function values(){

        return $this->hasMany('App\Models\Product\CustomValue','option_id');
    }

    public function value(){

        return $this->hasOne('App\Models\Product\CustomValue','option_id');
    }

    public function type(){

        return $this->belongsTo('App\Models\Product\OptionFieldType','field_type');
    }

}
