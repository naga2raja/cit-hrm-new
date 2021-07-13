<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class mCompany extends Model
{
    protected $fillable = ['company_name', 'incorporation_date','tax_id', 'registration_number', 'phone_number', 'email', 'website', 'address_street_1', 'address_street_2', 'city', 'state_province', 'zip_code', 'country_id'];
}
