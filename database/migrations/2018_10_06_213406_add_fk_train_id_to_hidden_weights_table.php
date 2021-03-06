<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFkTrainIdToHiddenWeightsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('hidden_weights', function(Blueprint $table){
            $table->foreign('train_id')
                  ->references('id')
                  ->on('rna_trainings')
                  ->onDelete('set null')
                  ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('hidden_weights', function(Blueprint $table){
            $table->dropForeign('hidden_weights_train_id_foreign');
        });
    }
}
