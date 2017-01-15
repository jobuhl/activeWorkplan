<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAlldayEvent extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
{
    Schema::create('allday_event', function (Blueprint $table) {
        $table->increments('id');
        $table->date('date');
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
    Schema::dropIfExists('allday_event');
}
}
