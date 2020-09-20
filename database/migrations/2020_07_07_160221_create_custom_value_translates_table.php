<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomValueTranslatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('custom_value_translates', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('custom_value_id')->unsigned();
            $table->string('name');
            $table->string('locale',3);

            $table->index(['custom_value_id']);
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
        Schema::dropIfExists('custom_value_translates');
        Schema::enableForeignKeyConstraints();
    }
}
