<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RetailStore extends Model
{
    /**
     * almutz
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'retail_store';

    protected $fillable = ['id', 'name', 'company_id', 'address_id'];
}
