<?php

namespace App\Models\Data;

use Illuminate\Database\Eloquent\Model;

class ScheduleWeek extends Model
{
    public function translation(){
        return $this
            ->hasOne('App\Models\Data\ScheduleWeekTranslate','schedule_week_id','id')
            ->where('locale',app()->getLocale())
            ->select(['schedule_week_id','name']);
    }
}
