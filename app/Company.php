<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    /**
     * almutz
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'company';

    protected $fillable = ['id', 'name', 'admin_id', 'address_id'];

}
