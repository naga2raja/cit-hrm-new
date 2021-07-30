<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddIsImportFieldToTPunchInOutsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('t_punch_in_outs', function (Blueprint $table) {
            $table->tinyInteger('is_import')->default(0)->after('status')->comments('0-manual entry, 1-biometric data import');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('t_punch_in_outs', function (Blueprint $table) {
            //
        });
    }
}
