<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAddress2 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
{
    Schema::create('address', function (Blueprint $table) {
        $table->increments('id');
        $table->string('street');
        $table->string('street_nr');
        $table->string('postcode');

        $table->integer('city_id')->unsigned();
        $table->foreign('city_id')->references('id')->on('city')->onDelete('cascade');

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
    Schema::dropIfExists('address');
}
}
