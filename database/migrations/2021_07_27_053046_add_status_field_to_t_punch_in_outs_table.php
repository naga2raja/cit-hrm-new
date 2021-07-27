<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddStatusFieldToTPunchInOutsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('t_punch_in_outs', function (Blueprint $table) {
            $table->tinyInteger('status')->default(0)->comment('0-pending, 1-approved, 2-rejected')->after('state');
            $table->bigInteger('created_by')->after('status');
            $table->bigInteger('updated_by')->after('created_by');
            $table->text('comments')->nullable()->after('updated_by');
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
        Schema::table('t_punch_in_outs', function (Blueprint $table) {
            //
        });
    }
}
