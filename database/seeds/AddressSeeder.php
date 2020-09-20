<?php

use App\Models\User\UserAddress;
use Grimzy\LaravelMysqlSpatial\Types\Point;
use Illuminate\Database\Seeder;

class AddressSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $addresses = [
            [
                'user_id' => 1,
                'name' =>'Bakı şəhəri Samir Əsədov küçəsi 45',
                'location' => new Point(50.301431887572001,40.394701787557999),
            ],
            [
                'user_id' => 2,
                'name' =>'Bakı şəhəri Qabil Salahov 43',
                'location' => new Point(52.301431887572001,43.394701787557999),
            ],
        ];
        foreach ($addresses as $address){
            UserAddress::updateOrCreate($address,$address);
        }
    }
}
