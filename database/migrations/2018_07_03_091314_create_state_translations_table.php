<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateStateTranslationsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('state_translations', function (Blueprint $table) {
            $table->integer('state_translation_id', true);
            $table->integer('state_index_id');
            $table->string('state_descr');
            $table->boolean('state_draw_graph');
            $table->smallInteger('state_value')->default(0);
            $table->boolean('state_generic_value');
            $table->timestamp('state_lastupdated')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->unique(['state_index_id','state_value'], 'state_index_id_value');
        });

        \DB::statement("ALTER TABLE `state_translations` CHANGE `state_value` `state_value` smallint(5) NOT NULL DEFAULT '0' ;");
        \DB::statement("ALTER TABLE `state_translations` CHANGE `state_lastupdated` `state_lastupdated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP;");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('state_translations');
    }
}
