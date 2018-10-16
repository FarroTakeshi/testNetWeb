<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSecondHiddenWeightsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('second_hidden_weights', function (Blueprint $table) {
            $table->increments('id');
            $table->double('neuron1', 21, 20);
            $table->double('neuron2', 21, 20);
            $table->integer('train_id')->unsigned()->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('second_hidden_weights');
    }
}
