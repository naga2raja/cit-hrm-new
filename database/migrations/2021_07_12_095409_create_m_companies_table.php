<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMCompaniesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('m_companies', function (Blueprint $table) {
            $table->id();
            $table->string('company_name', 255);
            $table->date('incorporation_date')->nullable();
            $table->string('tax_id', 9)->nullable();
            $table->string('registration_number', 20)->nullable();
            $table->string('email')->nullable();
            $table->string('website', 255)->nullable();
            $table->string('phone_number', 20)->nullable();
            $table->string('address_street_1', 255)->nullable();
            $table->string('address_street_2', 255)->nullable();
            $table->string('city', 64)->nullable();
            $table->string('state_province', 64)->nullable();
            $table->string('zip_code', 10)->nullable();
            $table->integer('country_id')->nullable();
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
        Schema::dropIfExists('m_companies');
    }
}
