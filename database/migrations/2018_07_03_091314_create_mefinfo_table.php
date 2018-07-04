<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateMefinfoTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mefinfo', function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('device_id')->index('device_id');
            $table->integer('mefID')->index('mefID');
            $table->string('mefType', 128);
            $table->string('mefIdent', 128);
            $table->integer('mefMTU')->default(1500);
            $table->string('mefAdmState', 128);
            $table->string('mefRowState', 128);
        });

        \DB::statement("ALTER TABLE `mefinfo` CHANGE `mefID` `mefID` int(32) NOT NULL ;");
        \DB::statement("ALTER TABLE `mefinfo` CHANGE `mefMTU` `mefMTU` int(16) NOT NULL DEFAULT '1500' ;");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('mefinfo');
    }
}
