<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ModifyLogTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('t_logs', function (Blueprint $table) {
            // create new column
            $table->bigInteger('module_id')->after('module');
            $table->tinyInteger('status')->default(0)->comment('0-active, 1-inactive')->after('send_to');
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
