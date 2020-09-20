<?php

use App\Models\Order\OrderPaymentMethod;
use Illuminate\Database\Seeder;

class OrderPaymentMethodSeeder extends Seeder
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
                'name' =>'Nağd'
            ],
            [
                'id' => 2,
                'name' =>'Kartla ödəniş'
            ],
        ];
        foreach ($statuses as $status){
            OrderPaymentMethod::updateOrCreate($status,$status);
        }
    }
}
