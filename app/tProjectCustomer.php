<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tProjectCustomer extends Model
{
    protected $fillable = ['project_id', 'customer_id'];
}
