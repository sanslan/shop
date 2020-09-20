<?php

namespace App\Models\Brand;

use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    protected $guarded = [];
    public $timestamps = false;

    public function getLogoAttribute($value)
    {
        return ucfirst($value);
    }
}
