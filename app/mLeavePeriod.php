<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class mLeavePeriod extends Model
{
    protected $fillable = ['start_month', 'start_date', 'start_period', 'end_period', 'country_id', 'sub_unit_id'];

    public function countryName()
	{
	    return $this->belongsTo('App\mCountry', 'country_id', 'id');
	}

	public function subUnitName()
	{
	    return $this->belongsTo('App\mCompanyLocation', 'sub_unit_id', 'id');
	}
}
