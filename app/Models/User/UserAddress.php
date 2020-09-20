<?php

namespace App\Models\User;

use Grimzy\LaravelMysqlSpatial\Eloquent\SpatialTrait;
use Illuminate\Database\Eloquent\Model;

class UserAddress extends Model
{
    public $timestamps  = false;

    use SpatialTrait;

    protected $spatialFields = ['location'];

    protected $guarded = ['id'];
}
