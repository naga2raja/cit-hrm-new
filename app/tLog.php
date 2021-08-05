<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tLog extends Model
{
    protected $fillable = ['action', 'module', 'date', 'send_by', 'send_to'];
}
