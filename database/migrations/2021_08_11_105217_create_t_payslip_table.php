<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateTPayslipTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('t_payslips', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('employee_id');
            $table->date('pay_month');
            $table->text('pay_slip_pdf');
            $table->text('comments')->nullable();
            $table->tinyInteger('status')->default(1)->comment('1-active, 0-in active');
            $table->bigInteger('created_by');
            $table->bigInteger('updated_by');
            $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP'));
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('t_payslip');
    }
}
