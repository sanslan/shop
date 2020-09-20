<?php

namespace App\Models\Data;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    public $timestamps = false;
    protected $guarded = [];

    public function translation(){
        return $this
            ->hasOne('App\Models\Data\CountryTranslate','country_id','id')
            ->where('locale',app()->getLocale())
            ->select(['country_id','name']);
    }

    public function cities(){
        return $this->hasMany('City');
    }
}
