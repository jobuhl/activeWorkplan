<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TimeEvent extends Model
{
    protected $table = 'time_event';

    protected $fillable = ['id', 'date', 'from', 'to', 'employee_id', 'category_id', 'accepted'];
}
