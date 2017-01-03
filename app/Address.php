<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    /**
     * almutz
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'address';

    protected $fillable = ['id', 'street', 'street_nr', 'postcode', 'city_id'];

}
