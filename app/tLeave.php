<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class tLeave extends Model
{
    use SoftDeletes;

    public function leaveTypeName()
	{
	    return $this->belongsTo('App\mLeaveType', 'leave_type_id', 'id');
	}
}
