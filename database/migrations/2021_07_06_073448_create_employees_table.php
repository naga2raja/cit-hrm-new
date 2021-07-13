<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id')->unsigned()->nullable();
            $table->string('employee_id');
            $table->string('first_name');
            $table->string('middle_name')->nullable();
            $table->string('last_name');
            $table->enum('gender', ['Male', 'Female'])->nullable();
            $table->tinyInteger('marital_status')->default(0)->comment('0 - No, 1 - Yes');
            $table->date('date_of_birth')->nullable();
            $table->string('nationality', 50)->nullable();
            $table->integer('job_id')->nullable();
            $table->integer('job_category_id')->nullable();            
            $table->integer('company_location_id')->nullable();
            $table->date('joined_date')->nullable();
            $table->date('left_date')->nullable();
            $table->text('profile_photo')->nullable();
            $table->text('resume')->nullable();
            //$table->text('assigned_user_id')->nullable()->comments('assigned manager user id');
            $table->enum('status', ['Active', 'In active'])->nullable();
            $table->bigInteger('created_by');   
            $table->bigInteger('updated_by');
            $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP'));
            $table->softDeletes();

            $table->index('user_id');
            $table->index('employee_id');
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('employees');
    }
}
