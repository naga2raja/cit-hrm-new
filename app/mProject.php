<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class mProject extends Model
{
    protected $fillable = ['customer_id', 'project_name', 'project_description'];
}
