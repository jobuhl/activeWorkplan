<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmployee2 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
{
    Schema::create('employee', function (Blueprint $table) {
        $table->increments('id');
        $table->string('forename');
        $table->string('surname');
        $table->string('email')->unique();
        $table->string('password');

        $table->integer('retail_store_id')->unsigned();
        $table->foreign('retail_store_id')->references('id')->on('retail_store')->onDelete('cascade');

        $table->integer('contract_id')->unsigned();
        $table->foreign('contract_id')->references('id')->on('contract')->onDelete('cascade');

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
    Schema::dropIfExists('employee');
}
}
