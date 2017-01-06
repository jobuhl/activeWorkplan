<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WorktimePreferred extends Model
{
    protected $table = 'worktime_preferred';

    protected $fillable = ['id', 'date', 'from', 'to', 'employee_id', 'category_id'];
}
