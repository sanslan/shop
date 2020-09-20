<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class StatesTranslateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        \App\Models\Data\StateTranslate::truncate();
        DB::table('state_translates')->insert([
            [
                'id' => 1,
                'state_id' =>1,
                'name' => 'Bakıxanov',
                'locale' => 'az'
            ],
            [
                'id' => 3,
                'state_id' =>2,
                'name' => 'Binəqədi',
                'locale' => 'az'
            ],
        ]);
        Schema::enableForeignKeyConstraints();
    }
}
