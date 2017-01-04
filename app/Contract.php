<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contract extends Model
{
    /**
     * almutz
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'contract';

    protected $fillable = ['id', 'period_of_agreement', 'working_hours', 'classification'];

}
