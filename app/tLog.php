<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tLog extends Model
{
    protected $fillable = ['action', 'module', 'module_id', 'date', 'send_by', 'send_to', 'status'];
}
