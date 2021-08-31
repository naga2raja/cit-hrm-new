<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ModifyLeavePeriodsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('m_leave_periods', function (Blueprint $table) {
            // create new column
            $table->date('start_period')->nullable()->after('start_date');
            $table->date('end_period')->nullable()->after('start_period');
            $table->integer('country_id')->nullable()->after('end_period');
            $table->integer('sub_unit_id')->nullable()->after('country_id');
            $table->tinyInteger('status')->default(0)->comment('0 - In-active, 1 - Active')->after('sub_unit_id');
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
