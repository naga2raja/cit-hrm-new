<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class mLeaveEntitlement extends Model
{
    protected $fillable = ['emp_number', 'no_of_days', 'days_used', 'leave_type_id', 'from_date', 'to_date', 'entitlement_type'];
}