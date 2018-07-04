<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTnmsneinfoTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tnmsneinfo', function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('device_id')->index('device_id');
            $table->integer('neID')->index('neID');
            $table->string('neType', 128);
            $table->string('neName', 128);
            $table->string('neLocation', 128);
            $table->string('neAlarm', 128);
            $table->string('neOpMode', 128);
            $table->string('neOpState', 128);
        });

        \DB::statement("ALTER TABLE `tnmsneinfo` CHANGE `neID` `neID` int(32) NOT NULL ;");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('tnmsneinfo');
    }
}
