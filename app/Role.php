<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class role extends Model
{
    /**
     * almutz
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'role';

    protected $fillable = ['id', 'name'];
}
