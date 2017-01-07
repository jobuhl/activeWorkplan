<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AlldayEvent extends Model
{
    protected $table = 'allday_event';

    protected $fillable = ['id', 'date', 'employee_id', 'category_id'];

}
