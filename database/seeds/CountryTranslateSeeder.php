<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CountryTranslateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        \App\Models\Data\CountryTranslate::truncate();
        DB::table('country_translates')->insert([
            [
                'id' => 1,
                'country_id' =>1,
                'name' => 'Azərbaycan',
                'locale' => 'az'
            ],
            [
                'id' => 2,
                'country_id' =>1,
                'name' => 'Azerbaijan',
                'locale' => 'en'
            ],
            [
                'id' => 3,
                'country_id' =>2,
                'name' => 'Türkiyə',
                'locale' => 'az'
            ],
            [
                'id' => 4,
                'country_id' =>2,
                'name' => 'Turkey',
                'locale' => 'en'
            ],
        ]);
        Schema::enableForeignKeyConstraints();
    }
}
