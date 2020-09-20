<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CityTranslateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        \App\Models\Data\CityTranslate::truncate();
        DB::table('city_translates')->insert([
            [
                'id' => 1,
                'city_id' =>1,
                'name' => 'Bakı',
                'locale' => 'az'
            ],
            [
                'id' => 2,
                'city_id' =>1,
                'name' => 'Baku',
                'locale' => 'en'
            ],
            [
                'id' => 3,
                'city_id' =>2,
                'name' => 'Şəki',
                'locale' => 'az'
            ],
            [
                'id' => 4,
                'city_id' =>2,
                'name' => 'Sheki',
                'locale' => 'en'
            ],
        ]);
        Schema::enableForeignKeyConstraints();
    }
}
