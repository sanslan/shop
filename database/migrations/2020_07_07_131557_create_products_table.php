<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->string('slug');
            $table->string('sku',12)->nullable();
            $table->integer('category_id')->unsigned()->unsigned();
            $table->integer('brand_id')->unsigned()->nullable()->unsigned();
            $table->decimal('price',8,2);
            $table->decimal('new_price',8,2)->nullable();
            $table->string('weight',10)->nullable();
            $table->integer('stock')->unsigned()->nullable()->default(0);
            $table->integer('shop_branch_id')->unsigned();

            $table->index(['category_id','brand_id','shop_branch_id']);
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
        Schema::dropIfExists('products');
        Schema::enableForeignKeyConstraints();
    }
}
