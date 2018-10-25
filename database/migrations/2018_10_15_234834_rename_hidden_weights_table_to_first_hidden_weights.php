<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RenameHiddenWeightsTableToFirstHiddenWeights extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('hidden_weights', function (Blueprint $table) {
            $table->double('neuron4', 21, 20);
        });

        Schema::rename('hidden_weights', 'first_hidden_weights');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::rename('first_hidden_weights', 'hidden_weights');

        Schema::table('hidden_weights', function (Blueprint $table) {
            $table->dropColumn('neuron4');
        });
    }
}
