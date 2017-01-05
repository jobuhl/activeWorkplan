<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContract2 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
{
    Schema::create('contract', function (Blueprint $table) {
        $table->increments('id');
        $table->string('period_of_agreement');
        $table->integer('working_hours');
        $table->string('classification');

        $table->integer('role_id')->unsigned();
        $table->foreign('role_id')->references('id')->on('role')->onDelete('cascade');

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
    Schema::dropIfExists('contract');
}
}
