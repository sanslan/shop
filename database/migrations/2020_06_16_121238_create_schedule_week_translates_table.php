<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateScheduleWeekTranslatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('schedule_week_translates', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('schedule_week_id')->unsigned();
            $table->string('name');
            $table->string('locale',3);

            $table->index(['schedule_week_id']);
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
        Schema::dropIfExists('schedule_week_translates');
        Schema::enableForeignKeyConstraints();
    }
}
