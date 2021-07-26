<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTPunchInOutsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('t_punch_in_outs', function (Blueprint $table) {
            $table->id();
            $table->integer('employee_id');
            $table->datetime('punch_in_utc_time');
            $table->string('punch_in_note', 255);
            $table->string('punch_in_time_offset', 255);
            $table->datetime('punch_in_user_time');
            $table->datetime('punch_out_utc_time')->nullable();
            $table->string('punch_out_note', 255)->nullable();
            $table->string('punch_out_time_offset', 255)->nullable();
            $table->datetime('punch_out_user_time')->nullable();
            $table->string('state', 20);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('t_punch_in_outs');
    }
}
