<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EmployeePerHour extends Model
{
    /**
     * almutz
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'employee_per_hour';

    protected $fillable = ['id', 'amount', 'date', 'start','end', 'retail_store_id'];

}
