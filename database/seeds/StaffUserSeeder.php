<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class StaffUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Panel\Staff\Staff::truncate();
        DB::table('staffs')->insert(
            [
                'id' => 1,
                'name' =>'Staff user',
                'email' => 'staff@email.com',
                'password' => Hash::make('troyan'),
                'role_id' => 1,
                'is_active' => 1
            ]
        );
    }
}
