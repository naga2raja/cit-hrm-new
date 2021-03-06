<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTTimesheetItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('t_timesheet_items', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('timesheet_id');
            $table->bigInteger('employee_id');
            $table->date('date');
            $table->bigInteger('project_id');
            $table->bigInteger('activity_id');
            $table->text('comments')->nullable();
            $table->bigInteger('duration');
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
        Schema::dropIfExists('t_timesheet_items');
    }
}
