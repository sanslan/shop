<?php

use Illuminate\Database\Seeder;
use App\Models\Shop\ShopUserRole;

class ShopUserRolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = [
            [
                'id' => 1,
                'name' =>'Admin'
            ],
            [
                'id' => 2,
                'name' =>'Sales'
            ],
        ];
        foreach ($roles as $role){
            ShopUserRole::updateOrCreate($role,$role);
        }
    }
}
