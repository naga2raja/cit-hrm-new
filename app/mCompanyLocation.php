<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class mCompanyLocation extends Model
{
    protected $fillable = ['company_name', 'country_id', 'state_province', 'city', 'address', 'zip_code', 'phone_number', 'fax', 'notes'];
}
