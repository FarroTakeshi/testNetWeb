<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEstimationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('estimations', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('s_actor');
            $table->integer('a_actor');
            $table->integer('c_actor');
            $table->integer('s_usecase');
            $table->integer('a_usecase');
            $table->integer('c_usecase');
            $table->integer('tef');
            $table->integer('f_productivity');
            $table->integer('effort_estimated');
            $table->dateTime('request_date');
            $table->integer('user_id')->unsigned()->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('estimations');
    }
}
