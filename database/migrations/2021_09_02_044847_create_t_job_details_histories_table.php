<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTJobDetailsHistoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('t_job_details_histories', function (Blueprint $table) {
            $table->id();
            $table->integer('employee_id');
            $table->date('start_date')->nullable();
            $table->date('end_date')->nullable();
            $table->integer('job_id')->nullable();
            $table->integer('job_category_id')->nullable();
            $table->integer('company_location_id')->nullable();
            $table->bigInteger('created_by')->nullable();
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
        Schema::dropIfExists('t_job_details_histories');
    }
}
