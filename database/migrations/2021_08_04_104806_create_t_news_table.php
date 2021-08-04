<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTNewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('t_news', function (Blueprint $table) {
            $table->id();
            $table->text('title')->nullable();
            $table->text('news');
            $table->string('category')->nullable();
            $table->date('date');
            $table->text('uploads')->nullable();
            $table->enum('status', ['Active', 'In active'])->nullable();
            $table->bigInteger('created_by');   
            $table->bigInteger('updated_by');
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
        Schema::dropIfExists('t_news');
    }
}
