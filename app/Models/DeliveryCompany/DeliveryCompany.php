<?php

namespace App\Models\DeliveryCompany;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Tymon\JWTAuth\Contracts\JWTSubject;

class DeliveryCompany extends Authenticatable implements JWTSubject
{
    use  Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password'
    ];

    public $timestamps = false;

    /**
     * Get the identifier that will be stored in the subject claim of the JWT.
     *
     * @return mixed
     */
    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    /**
     * Return a key value array, containing any custom claims to be added to the JWT.
     *
     * @return array
     */
    public function getJWTCustomClaims()
    {
        return [];
    }

    public function sub_accounts(){
        return $this->hasMany('App\Models\Finance\SubAccount','account_id','account_id');
    }

    public function couriers(){
        return $this->hasMany('App\Models\DeliveryCompany\Courier','company_id');
    }

    public function getBalanceAttribute(){
        return $this->sub_accounts()->sum('balance');
    }

    public function getCourierCountAttribute(){
        return $this->couriers()->count();
    }

}
