<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(ShopUserRolesSeeder::class);
        $this->call(StaffRolesSeeder::class);
        $this->call(StaffNavigationSeeder::class);
        $this->call(CountrySeeder::class);
        $this->call(CountryTranslateSeeder::class);
        $this->call(CitySeeder::class);
        $this->call(CityTranslateSeeder::class);
        $this->call(ScheduleWeekSeeder::class);
        $this->call(ScheduleWeekTranslateSeeder::class);
        $this->call(ShopStatusSeeder::class);
        $this->call(ShopBranchStatusSeeder::class);
        $this->call(AddressSeeder::class);
        $this->call(OptionTypesSeeder::class);
        $this->call(OrderPaymentMethodSeeder::class);
        $this->call(OrderStatusSeeder::class);
        $this->call(CourierVehiceTypesSeeder::class);
        $this->call(CourierSeeder::class);
        $this->call(StatesSeeder::class);
        $this->call(StatesTranslateSeeder::class);
        $this->call(StaffUserSeeder::class);
    }
}
