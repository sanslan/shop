<?php

namespace App\Models\DeliveryCompany;

use Illuminate\Database\Eloquent\Model;

class DeliveryCompanyUser extends Model
{
    protected $guarded = [];

    protected $hidden = [
        'password'
    ];
}
