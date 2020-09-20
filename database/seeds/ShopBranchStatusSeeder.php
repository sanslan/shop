<?php

use App\Models\Shop\ShopBranchStatus;
use Illuminate\Database\Seeder;

class ShopBranchStatusSeeder extends Seeder
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
            ShopBranchStatus::updateOrCreate($status,$status);
        }
    }
}
