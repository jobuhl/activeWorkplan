<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AlldayFix extends Model
{
    protected $table = 'allday_fix';

    protected $fillable = ['id', 'date', 'employee_id', 'category_id'];

}
