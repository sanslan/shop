<?php

use Illuminate\Database\Seeder;
use App\Models\Panel\Staff\StaffRole;

class StaffRolesSeeder extends Seeder
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
                'name' =>'Moderator'
            ],
        ];
        foreach ($roles as $role){
            StaffRole::updateOrCreate($role,$role);
        }
    }
}
