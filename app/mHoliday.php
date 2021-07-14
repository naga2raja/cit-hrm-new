<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class mHoliday extends Model
{
    protected $fillable = ['description', 'date', 'recurring', 'length', 'operational_country_id'];
}
