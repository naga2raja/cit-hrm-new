<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTPayGradeCurrenciesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('t_pay_grade_currencies', function (Blueprint $table) {
            $table->id();
            $table->integer('pay_grade_id')->nullable();
            $table->integer('currency_id')->nullable();
            $table->decimal('min_salary', 10,0)->nullable();
            $table->decimal('max_salary', 10,0)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('t_pay_grade_currencies');
    }
}
