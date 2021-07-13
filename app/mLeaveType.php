<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class mLeaveType extends Model
{
    protected $fillable = ['operational_country_id', 'name', 'exclude_if_no_entitlement'];
}
