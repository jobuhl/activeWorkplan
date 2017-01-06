<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WorktimeFix extends Model
{
    protected $table = 'worktime_fix';

    protected $fillable = ['id', 'date', 'from', 'to', 'employee_id', 'category_id'];
}
