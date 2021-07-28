<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class mProject extends Model
{
    protected $fillable = ['project_name', 'project_description', 'customer_id'];

    public function allActivities()
	{
	    return $this->hasMany('App\tActivity', 'project_id', 'id');
	}
}
