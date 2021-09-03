<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class mHoliday extends Model
{
    protected $fillable = ['description', 'date', 'recurring', 'length', 'operational_country_id', 'operational_sub_unit_id'];

    public function countryName()
	{
	    return $this->belongsTo('App\mCountry', 'operational_country_id', 'id');
	}

	public function subUnitName()
	{
	    return $this->belongsTo('App\mCompanyLocation', 'operational_sub_unit_id', 'id');
	}
}
