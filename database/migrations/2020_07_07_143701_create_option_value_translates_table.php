<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOptionValueTranslatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('option_value_translates', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('value_id')->unsigned();
            $table->string('name');
            $table->string('locale');

            $table->index(['value_id']);
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
        Schema::dropIfExists('option_value_translates');
        Schema::enableForeignKeyConstraints();
    }
}
