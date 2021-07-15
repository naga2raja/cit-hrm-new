<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateLeaveTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('t_leaves', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('employee_id');
            $table->date('date')->comment('leave date');
            $table->decimal('length_hours', 10, 2); //8 hours pre day. Half a day - 0.5
            $table->decimal('length_days', 10, 2); //1 - full day , 0.5 - half a day
            $table->smallInteger('status'); // Leave status id
            $table->tinyInteger('approval_level')->default(0)->comment('0-Employee, 1-Manager, 2-Admin');
            $table->text('comments')->nullable();
            $table->integer('leave_type_id'); // CL/EL leave
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
        Schema::dropIfExists('t_leaves');
    }
}
