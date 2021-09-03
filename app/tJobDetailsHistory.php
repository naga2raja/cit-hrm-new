<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tJobDetailsHistory extends Model
{
    protected $fillable = ['employee_id', 'start_date', 'end_date', 'job_id', 'job_category_id', 'company_location_id', 'created_by'];
}