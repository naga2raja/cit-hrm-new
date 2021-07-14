<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMHolidaysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('m_holidays', function (Blueprint $table) {
            $table->id();
            $table->string('description')->nullable();
            $table->date('date')->nullable();
            $table->tinyInteger('recurring')->default(0)->comment('0 - No, 1 - Yes');
            $table->integer('length')->nullable();
            $table->integer('operational_country_id')->nullable();
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
        Schema::dropIfExists('m_holidays');
    }
}
