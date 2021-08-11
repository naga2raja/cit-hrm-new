<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tNews extends Model
{
    protected $fillable = ['title', 'news', 'category', 'project_id', 'date', 'uploads', 'status', 'created_by', 'updated_by'];
}
