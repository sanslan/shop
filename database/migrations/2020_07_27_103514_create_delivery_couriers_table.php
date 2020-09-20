<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDeliveryCouriersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('delivery_couriers', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('company_id');
            $table->integer('user_id');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('photo')->nullable();
            $table->integer('vehicle_type_id');
            $table->integer('country_id');
            $table->integer('city_id');
            $table->integer('state_id')->nullable();
            $table->string('address');
            $table->integer('sub_account_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('delivery_couriers');
    }
}
