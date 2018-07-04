<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateComponentPrefsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('component_prefs', function (Blueprint $table) {
            $table->increments('id')->unsigned()->comment('ID for each entry');
            $table->unsignedInteger('component')->index('component')->comment('id from the component table');
            $table->string('attribute')->comment('Attribute for the Component');
            $table->text('value', 65535)->comment('Value for the Component');
        });

        \DB::statement("ALTER TABLE `component_prefs` CHANGE `id` `id` int(11) unsigned NOT NULL auto_increment;");
        \DB::statement("ALTER TABLE `component_prefs` CHANGE `component` `component` int(11) unsigned NOT NULL ;");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('component_prefs');
    }
}
