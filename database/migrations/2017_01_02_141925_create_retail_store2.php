<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRetailStore2 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
{
    Schema::create('retail_store', function (Blueprint $table) {
        $table->increments('id');
        $table->string('name');

        $table->integer('company_id')->unsigned();
        $table->foreign('company_id')->references('id')->on('company')->onDelete('cascade');

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
    Schema::dropIfExists('retail_store');
}
}
