<?php

use Illuminate\Database\Seeder;
use App\Models\Shop\ShopStatus;

class ShopStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $statuses = [
            [
                'id' => 1,
                'name' =>'Aktiv'
            ],
            [
                'id' => 2,
                'name' =>'Deaktiv'
            ],
        ];
        foreach ($statuses as $status){
            ShopStatus::updateOrCreate($status,$status);
        }
    }
}
