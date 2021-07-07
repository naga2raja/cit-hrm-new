<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class mPayGrade extends Model
{
	protected $fillable = ['id', 'currency_id', 'pay_grade', 'min_salary', 'max_salary'];
}
