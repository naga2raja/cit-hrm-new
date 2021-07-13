<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class mLeaveType extends Model
{
    protected $fillable = ['name', 'exclude_if_no_entitlement', 'operational_country_id'];
}
