<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCartProductOptionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cart_product_options', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('cart_product_id')->unsigned();
            $table->integer('product_option_id')->unsigned();
            $table->integer('quantity');

            $table->index('cart_product_id');

            $table->foreign('cart_product_id')->references('id')->on('cart_products');
            $table->foreign('product_option_id')->references('id')->on('product_options');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cart_product_options');
    }
}
