<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tTimesheetItem extends Model
{
    protected $fillable = ['timesheet_id', 'employee_id', 'date', 'project_id', 'activity_id', 'duration', 'comments'];
    
    public function employeeName()
	{
	    return $this->belongsTo('App\Employee', 'employee_id', 'id');
	}

	public function projectName()
	{
	    return $this->belongsTo('App\mProject', 'project_id', 'id');
	}

	public function activityName()
	{
	    return $this->belongsTo('App\tActivity', 'activity_id', 'id');
	}
}
