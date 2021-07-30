<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ModifyTimesheetTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('t_timesheets', function (Blueprint $table) {
            // change datatype column            
            $table->smallInteger('status')->default(0)->comment('0-not_submitted, 1-submitted, 2-approved, 3-rejected')->change();
            // create new column
            $table->text('comments')->nullable()->after('status');
            $table->bigInteger('created_by')->nullable()->after('comments');
            $table->bigInteger('updated_by')->nullable()->after('created_by');
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
        //
    }
}
