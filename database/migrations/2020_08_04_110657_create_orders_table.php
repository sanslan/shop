<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('cart_id')->unsigned();
            $table->integer('shop_branch_id')->unsigned();
            $table->integer('status_id')->unsigned();
            $table->integer('payment_method')->unsigned();
            $table->integer('payment_status');
            $table->integer('user_id')->unsigned();
            $table->integer('user_address_id')->unsigned();
            $table->integer('courier_id')->unsigned();
            $table->tinyInteger('is_takeaway')->default(0);
            $table->decimal('delivery_cost');
            $table->timestamp('delivery_datetime');
            $table->timestamps();

            $table->index(['user_id','courier_id','shop_branch_id']);

            $table->foreign('cart_id')->references('id')->on('carts');
            $table->foreign('shop_branch_id')->references('id')->on('shop_branches');
            $table->foreign('status_id')->references('id')->on('order_statuses');
            $table->foreign('payment_method')->references('id')->on('order_payment_methods');
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('user_address_id')->references('id')->on('user_addresses');
            $table->foreign('courier_id')->references('id')->on('delivery_couriers');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
}
