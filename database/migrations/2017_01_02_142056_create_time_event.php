<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTimeEvent extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
{
    Schema::create('time_event', function (Blueprint $table) {
        $table->increments('id');
        $table->string('date');
        $table->string('from');
        $table->string('to');
        $table->boolean('accepted');

        $table->integer('employee_id')->unsigned();
        $table->foreign('employee_id')->references('id')->on('employees')->onDelete('cascade');

        $table->integer('category_id')->unsigned();
        $table->foreign('category_id')->references('id')->on('category')->onDelete('cascade');

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
    Schema::dropIfExists('time-event');
}
}
