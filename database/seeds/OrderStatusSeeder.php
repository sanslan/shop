<?php

use App\Models\Order\OrderStatus;
use App\Models\Order\OrderStatusTranslate;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OrderStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        OrderStatusTranslate::truncate();
        OrderStatus::truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
        $statuses = [
            [
                'id' => 1,
                'color' =>'#DC3545'
            ],
            [
                'id' => 2,
                'color' =>'#FFC107'
            ],
            [
                'id' => 3,
                'color' =>'#28A745'
            ]
        ];

        foreach ($statuses as $status){
            OrderStatus::updateOrCreate($status,$status);
        }

        $status_translates = [
            [
                'id' => 1,
                'status_id' => 1,
                'name' =>'Təsdiq gözləyir',
                'locale' => 'az'
            ],
            [
                'id' => 2,
                'status_id' => 2,
                'name' =>'Sifariş hazırlanır',
                'locale' => 'az'
            ],
            [
                'id' => 3,
                'status_id' => 3,
                'name' =>'Çatdırılıdı',
                'locale' => 'az'
            ],
            [
                'id' => 4,
                'status_id' => 1,
                'name' =>'Waiting gözləyir',
                'locale' => 'en'
            ],
            [
                'id' => 5,
                'status_id' => 2,
                'name' =>'Preparing',
                'locale' => 'en'
            ],
            [
                'id' => 6,
                'status_id' => 3,
                'name' =>'Delivered',
                'locale' => 'en'
            ],
        ];

        foreach ($status_translates as $translate){
            OrderStatusTranslate::updateOrCreate($translate,$translate);
        }


    }
}
