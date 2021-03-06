<?php

use Illuminate\Database\Seeder;
use App\mCurrency;

class CurrenciesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $currency = new mCurrency;
        $currency->currency_id = 'INR';
        $currency->currency_name = 'Indian Rupees';
        $currency->save();

        $currency = new mCurrency;
        $currency->currency_id = 'JPY';
        $currency->currency_name = 'Japanese Yen';
        $currency->save();
    }
}
