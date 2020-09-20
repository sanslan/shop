<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDeliveryCompaniesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('delivery_companies', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('logo')->nullable();
            $table->integer('account_id')->unsigned();
            $table->tinyInteger('is_active')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::create('delivery_companies', function (Blueprint $table) {
            Schema::disableForeignKeyConstraints();
            Schema::dropIfExists('delivery_companies');
            Schema::enableForeignKeyConstraints();
        });
    }
}
