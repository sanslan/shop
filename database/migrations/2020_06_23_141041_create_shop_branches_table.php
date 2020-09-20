<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateShopBranchesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shop_branches', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('shop_id')->unsigned();
            $table->string('name');
            $table->boolean('online')->nullable()->default(false);
            $table->integer('status_id')->default(1)->unsigned();
            $table->integer('sub_account_id')->unsigned();
            $table->integer('country_id')->unsigned();
            $table->integer('city_id')->unsigned();
            $table->integer('state_id')->nullable()->unsigned();
            $table->string('address');
            $table->point('location');
            $table->integer('schedule_start_week_id')->unsigned();
            $table->integer('schedule_end_week_id')->unsigned();
            $table->time('schedule_start_time');
            $table->time('schedule_end_time');
            $table->timestamps();

            $table->index(['shop_id','country_id','city_id','state_id']);
            $table->spatialIndex('location');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::disableForeignKeyConstraints();
        Schema::dropIfExists('shop_branches');
        Schema::enableForeignKeyConstraints();
    }
}
