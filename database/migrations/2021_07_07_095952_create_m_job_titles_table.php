<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMJobTitlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('m_job_titles', function (Blueprint $table) {
            $table->id();
            $table->string('job_title', 64)->nullable();
            $table->string('job_description', 255)->nullable();
            $table->binary('job_specification')->nullable();
            $table->string('job_specification_filename', 255)->nullable();
            $table->string('note', 255)->nullable();
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
        Schema::dropIfExists('m_job_titles');
    }
}
