<?php

namespace App\Models\Data;

use Illuminate\Database\Eloquent\Model;

class State extends Model
{
    public $timestamps = false;
    protected $guarded = [];

    public function translation(){
        return $this
            ->hasOne('App\Models\Data\StateTranslate','state_id','id')
            ->where('locale',app()->getLocale())
            ->select(['state_id','name']);
    }
}
