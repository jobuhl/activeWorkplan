<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWorktimeFix2 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
{
    Schema::create('worktime_fix', function (Blueprint $table) {
        $table->increments('id');
        $table->date('date');
        $table->string('from');
        $table->string('to');

        $table->integer('employee_id')->unsigned();
        $table->foreign('employee_id')->references('id')->on('employee')->onDelete('cascade');

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
    Schema::dropIfExists('worktime_fix');
}
}
