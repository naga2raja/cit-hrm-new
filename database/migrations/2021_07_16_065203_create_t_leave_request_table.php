<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateTLeaveRequestTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('t_leave_requests', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('employee_id');
            $table->integer('leave_type_id'); // CL/EL leave
            $table->date('from_date')->comment('leave from date');
            $table->date('to_date')->comment('leave to date');
            $table->text('comments')->nullable();
            $table->smallInteger('status'); // Leave status id
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
        Schema::dropIfExists('t_leave_request');
    }
}
