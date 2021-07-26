<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tTimesheet extends Model
{
    protected $fillable = ['employee_id', 'start_date', 'end_date', 'state'];
}
