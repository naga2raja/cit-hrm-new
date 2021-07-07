<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class mJobTitle extends Model
{
    protected $fillable = ['id', 'job_title', 'job_description', 'job_specification', 'job_specification_filename', 'note'];
}
