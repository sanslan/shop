<?php

use Illuminate\Database\Seeder;
use App\Models\Shop\ShopBranchStatus;

class ShopBranchStatusesSeeder extends Seeder
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
