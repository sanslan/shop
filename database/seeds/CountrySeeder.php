<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CountrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        \App\Models\Data\Country::truncate();
        DB::table('countries')->insert([
            [
                'id' => 1,
                'phone_code' =>994,
                'code' => 'az'
            ],
            [
                'id' => 2,
                'phone_code' =>90,
                'code' => 'tr'
            ],
        ]);
        Schema::enableForeignKeyConstraints();

    }
}
