<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMCompanyLocationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('m_company_locations', function (Blueprint $table) {
            $table->id();
            $table->string('company_name');
            $table->integer('country_id');
            $table->string('state_province');
            $table->string('city');
            $table->string('address');
            $table->integer('zip_code');
            $table->string('phone_number');
            $table->string('fax');
            $table->string('notes');
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
        Schema::dropIfExists('m_company_locations');
    }
}
