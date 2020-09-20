<?php

use App\Models\Product\OptionFieldType;
use Illuminate\Database\Seeder;

class OptionTypesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = [
            [
                'id' => 1,
                'name' =>'Select'
            ],
            [
                'id' => 2,
                'name' =>'Checkbox'
            ],
        ];
        foreach ($roles as $role){
            OptionFieldType::updateOrCreate($role,$role);
        }
    }
}
