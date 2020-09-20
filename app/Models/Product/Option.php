<?php

namespace App\Models\Product;

use Illuminate\Database\Eloquent\Model;

class Option extends Model
{
    public $timestamps = false;

    //protected $fillable = ['field_type','filterable','subcategory_id'];
    protected $guarded = [];

    public function translation(){

        return $this->hasMany('App\Models\Product\OptionTranslate');
    }

    public function tr(){

        return $this->hasOne('App\Models\Product\OptionTranslate')
            ->where('locale','=',app()->getLocale());
    }

    public function options_with_name(){

        return OptionValue::query()->where('option_id',$this->id)
            ->select('option_values.id','name')
            ->leftJoin('option_value_translates', 'option_values.id', '=', 'value_id')
            ->where('option_value_translates.locale',app()->getLocale())
            ->get();
    }

    public function type(){

        return $this->belongsTo('App\Models\Product\OptionFieldType','field_type','id');
    }

    public function values(){

        return $this->hasMany('App\Models\Product\OptionValue');
    }
}
