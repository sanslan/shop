<?php

namespace App\Models\Data;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    public $timestamps = false;
    protected $guarded = [];

    public function translation(){
        return $this->hasOne('App\Models\Data\CityTranslate')->where('locale',app()->getLocale());
    }
}
