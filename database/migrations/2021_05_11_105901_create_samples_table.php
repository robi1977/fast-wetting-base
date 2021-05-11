<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSamplesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('samples', function (Blueprint $table) {
            $table->id();
            $table->date('date');
            $table->string('media');
            $table->string('sample_number');
            $table->string('equipment');
            $table->string('method');
            $table->string('project');
            $table->string('alloy')->nullable();
            $table->string('substrate');
            $table->string('support')->nullable();
            $table->float('test_time');
            $table->float('temp');
            $table->string('remarks');
            $table->timestamps();
            $table->unsignedBigInteger('user_id');
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
        Schema::dropIfExists('samples');
    }
}
