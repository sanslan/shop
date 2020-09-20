<?php

use App\Models\DeliveryCompany\Courier;
use App\Models\DeliveryCompany\DeliveryCourierUsers;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

class CourierSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();

        Courier::truncate();
        DeliveryCourierUsers::truncate();

        DeliveryCourierUsers::insert([
            [
                'id' => 1,
                'email' => 'courier1@email.com',
                'password' => 'troyan',
                'email_verified_at' => now(),
                'phone' => '0553324534',
                'phone_verified_at' => now(),
                'is_active' => 1

            ],
            [
                'id' => 2,
                'email' => 'courier2@email.com',
                'password' => 'troyan',
                'email_verified_at' => now(),
                'phone' => '0553324535',
                'phone_verified_at' => now(),
                'is_active' => 1

            ],
            [
                'id' => 3,
                'email' => 'courier3@email.com',
                'password' => 'troyan',
                'email_verified_at' => now(),
                'phone' => '0553324536',
                'phone_verified_at' => now(),
                'is_active' => 1

            ],
        ]);
        Courier::insert([
            [
                'id' => 1,
                'company_id' => 1,
                'user_id' => 1,
                'first_name' => 'Resad',
                'last_name' => 'Resadov',
                'photo' => 'default.png',
                'vehicle_type_id' => 1,
                'country_id' => 1,
                'city_id' => 1,
                'state_id' => 1,
                'address' => 'Nerimanov metrosu',
                'sub_account_id' => 1
            ],
            [
                'id' => 2,
                'company_id' => 1,
                'user_id' => 1,
                'first_name' => 'Abas',
                'last_name' => 'Abasov',
                'photo' => 'default.png',
                'vehicle_type_id' => 1,
                'country_id' => 1,
                'city_id' => 1,
                'state_id' => 1,
                'address' => 'Gecnlik metrosu',
                'sub_account_id' => 2
            ],
            [
                'id' => 3,
                'company_id' => 1,
                'user_id' => 1,
                'first_name' => 'Mansur',
                'last_name' => 'Mansurov',
                'photo' => 'default.png',
                'vehicle_type_id' => 1,
                'country_id' => 1,
                'city_id' => 1,
                'state_id' => 1,
                'address' => 'Koroglu metrosu',
                'sub_account_id' => 3
            ],
        ]);

        Schema::enableForeignKeyConstraints();
    }
}
