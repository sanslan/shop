<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class ScheduleWeekSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        \App\Models\Data\ScheduleWeek::truncate();
        DB::table('schedule_weeks')->insert([
            [
                'id' => 1,
            ],
            [
                'id' => 2,
            ],
            [
                'id' => 3,
            ],
            [
                'id' => 4,
            ],
            [
                'id' => 5,
            ],
            [
                'id' => 6,
            ],
            [
                'id' => 7,
            ],
        ]);
        Schema::enableForeignKeyConstraints();
    }
}
