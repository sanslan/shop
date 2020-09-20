<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        \App\Models\Data\City::truncate();
        DB::table('cities')->insert([
            [
                'id' => 1,
                'country_id' =>1,
            ],
            [
                'id' => 2,
                'country_id' =>1,
            ],
        ]);
        Schema::enableForeignKeyConstraints();
    }
}
