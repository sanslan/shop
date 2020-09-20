<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomOptionValuesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('custom_option_values', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('product_option_id')->unsigned();
            $table->integer('custom_option_id')->unsigned();
            $table->integer('custom_value_id')->unsigned();

            $table->index(['product_option_id','custom_option_id','custom_value_id'],'cus_opt_value_indexs');
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
        Schema::dropIfExists('custom_option_values');
        Schema::enableForeignKeyConstraints();
    }
}
