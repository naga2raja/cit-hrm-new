<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTTimesheetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('t_timesheets', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('employee_id');
            $table->date('start_date');
            $table->date('end_date');
            $table->string('state')->nullable();
            $table->smallInteger('status')->default(0)->comment('0-not_submitted, 1-submitted, 2-approved, 3-rejected');
            // create new column
            $table->text('comments')->nullable();
            $table->bigInteger('created_by')->nullable();
            $table->bigInteger('updated_by')->nullable();
            
            $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP'));
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('t_timesheets');
    }
}
