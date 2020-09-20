<?php

namespace App\Models\Finance;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    const UPDATED_AT = null;

    protected $casts = [
        'created_at' => 'datetime:Y-m-d H:00',
    ];

    protected $guarded = [];

    public function sub_account(){
        return $this->belongsTo('App\Models\Finance\SubAccount');
    }

    public function staff(){
        return $this->belongsTo('App\Models\Panel\Staff\Staff');
    }

}
