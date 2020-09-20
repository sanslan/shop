<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class ScheduleWeekTranslateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        \App\Models\Data\ScheduleWeekTranslate::truncate();
        DB::table('schedule_week_translates')->insert([
            [
                'id' => 1,
                'schedule_week_id' =>1,
                'name' => 'bazar ertəsi',
                'locale' => 'az'
            ],
            [
                'id' => 2,
                'schedule_week_id' =>2,
                'name' => 'çərşənbə axşamı',
                'locale' => 'az'
            ],
            [
                'id' => 3,
                'schedule_week_id' =>3,
                'name' => 'çərşənbə',
                'locale' => 'az'
            ],
            [
                'id' => 4,
                'schedule_week_id' =>4,
                'name' => 'cümə axşamı',
                'locale' => 'az'
            ],
            [
                'id' => 5,
                'schedule_week_id' =>5,
                'name' => 'cümə',
                'locale' => 'az'
            ],
            [
                'id' => 6,
                'schedule_week_id' =>6,
                'name' => 'şənbə',
                'locale' => 'az'
            ],
            [
                'id' => 7,
                'schedule_week_id' =>7,
                'name' => 'bazar',
                'locale' => 'az'
            ],
        ]);
        Schema::enableForeignKeyConstraints();
    }
}
