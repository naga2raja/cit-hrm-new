<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class tLeaveRequest extends Model
{
    use SoftDeletes;

    public function allLeaveComments() {
        return $this->hasMany('App\tLeaveComment', 'leave_id', 'id');
    }
}
