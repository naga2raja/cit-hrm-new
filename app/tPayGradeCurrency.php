<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tPayGradeCurrency extends Model
{
    protected $fillable = ['id', 'pay_grade_id', 'currency_id', 'min_salary', 'max_salary'];

    public function currencyName()
	{
	    return $this->belongsTo('App\mCurrency', 'currency_id', 'currency_id');
	}
}
