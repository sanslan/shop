<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class StaffNavigationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        \App\Models\Panel\Staff\Navigation::truncate();
        DB::table('navigations')->insert([
            [
                'name' =>'Istifaəçilər',
                'route' => '/staff/users',
                'icon' => 'admin',
                'parent_id' => 0,
                'role_id' => 1
            ],
            [
                'name' =>'Kategoriyalar',
                'route' => '/staff/categories',
                'icon' => 'admin',
                'parent_id' => 0,
                'role_id' => 0
            ],
            [
                'name' =>'Mağazalar',
                'route' => '/staff/shops',
                'icon' => 'admin',
                'parent_id' => 0,
                'role_id' => 1
            ],
            [
                'name' =>'Ölkələr',
                'route' => '/staff/countries',
                'icon' => 'admin',
                'parent_id' => 0,
                'role_id' => 0
            ],
            [
                'name' =>'Şəhərlər',
                'route' => '/staff/cities',
                'icon' => 'admin',
                'parent_id' => 4,
                'role_id' => 0
            ],
        ]);
        Schema::enableForeignKeyConstraints();
    }
}
