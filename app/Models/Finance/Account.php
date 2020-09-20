<?php

namespace App\Models\Finance;

use Illuminate\Database\Eloquent\Model;

class Account extends Model
{

    protected $guarded = ['id'];

    public function sub_accounts(){
        return $this->hasMany('App\Models\Finance\SubAccount');
    }

    public function getBalanceAttribute(){
        return $this->sub_accounts()->sum('balance');
    }

}
