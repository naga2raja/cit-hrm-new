<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tTimesheet extends Model
{
    protected $fillable = ['id', 'employee_id', 'start_date', 'end_date', 'state'];

    public function allTimesheetItem()
	{
	    return $this->hasMany('App\tTimesheetItem', 'timesheet_id', 'id');
	}
}
