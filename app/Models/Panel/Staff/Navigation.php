<?php

namespace App\Models\Panel\Staff;

use Illuminate\Database\Eloquent\Model;

class Navigation extends Model
{
    public function sub()
    {
        return $this->hasMany('App\Models\Panel\Staff\Navigation','parent_id');
    }
}
