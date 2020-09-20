<?php

use App\Models\DeliveryCompany\CourierVehicleTypes;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

class CourierVehiceTypesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        CourierVehicleTypes::truncate();
        CourierVehicleTypes::insert([
            [
                'id' => 1,
                'name' => 'Avtomobil',
                'description' => 'Avtomobil ile catdirilma',
            ],
            [
                'id' => 2,
                'name' => 'Motosiklet',
                'description' => 'Motosiklet ile catdirilma',
            ],
        ]);
        Schema::enableForeignKeyConstraints();
    }
}
