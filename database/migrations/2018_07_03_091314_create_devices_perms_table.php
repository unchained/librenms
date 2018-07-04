<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateDevicesPermsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('devices_perms', function (Blueprint $table) {
            $table->integer('user_id')->index('user_id');
            $table->integer('device_id');
            $table->integer('access_level')->default(0);
        });
        \DB::statement("ALTER TABLE `devices_perms` CHANGE `access_level` `access_level` int(4) NOT NULL DEFAULT '0' ;");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('devices_perms');
    }
}
