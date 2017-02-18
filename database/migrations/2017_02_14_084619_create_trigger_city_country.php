<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTriggerCityCountry extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::unprepared('
        CREATE TRIGGER tr_city
        AFTER DELETE
        ON `address` FOR EACH ROW
            BEGIN
                IF 0 = (SELECT count(*) FROM address WHERE address.city_id = OLD.city_id)
                THEN
                    DELETE FROM city WHERE city.id = OLD.city_id;
                END IF;
            END
        ');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::unprepared('DROP TRIGGER `tr_city`');
    }
}
