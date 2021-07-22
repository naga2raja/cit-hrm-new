<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMLeaveEntitlementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('m_leave_entitlements', function (Blueprint $table) {
            $table->id();
            $table->integer('emp_number');
            $table->decimal('no_of_days', 10,2);
            $table->decimal('days_used', 10,2);
            $table->integer('leave_type_id');
            $table->date('from_date')->nullable();
            $table->date('to_date')->nullable();
            $table->integer('entitlement_type');
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
        Schema::dropIfExists('m_leave_entitlements');
    }
}