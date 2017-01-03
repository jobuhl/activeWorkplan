<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCompany2 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
{
    Schema::create('company', function (Blueprint $table) {
        $table->increments('id');
        $table->string('name');

        $table->integer('admin_id')->unsigned();
        $table->foreign('admin_id')->references('id')->on('admin')->onDelete('cascade');

        $table->integer('address_id')->unsigned();
        $table->foreign('address_id')->references('id')->on('address')->onDelete('cascade');

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
    Schema::dropIfExists('company');
}
}
