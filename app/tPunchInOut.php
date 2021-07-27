<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class tPunchInOut extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'employee_id', 
        'punch_in_utc_time', 
        'punch_in_note', 
        'punch_in_time_offset', 
        'punch_in_user_time', 
        'punch_out_utc_time', 
        'punch_out_note', 
        'punch_out_time_offset', 
        'punch_out_user_time', 
        'state',
        'status',
        'created_by',
        'updated_by',
        'comments'
    ];
}
