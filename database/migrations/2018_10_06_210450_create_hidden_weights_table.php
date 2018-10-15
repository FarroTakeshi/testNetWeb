<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHiddenWeightsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hidden_weights', function (Blueprint $table) {
            $table->increments('id');
            $table->double('neuron1', 21, 20);
            $table->double('neuron2', 21, 20);
            $table->double('neuron3', 21, 20);
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
        Schema::dropIfExists('hidden_weights');
    }
}
