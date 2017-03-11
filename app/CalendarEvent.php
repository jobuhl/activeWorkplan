<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CalendarEvent extends Model
{
    protected $table = 'calendar_event';

    protected $fillable = ['id', 'date', 'from', 'to', 'employee_id', 'category_id', 'accepted'];
}
