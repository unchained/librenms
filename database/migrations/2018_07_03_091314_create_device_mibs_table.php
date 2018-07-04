<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateDeviceMibsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('device_mibs', function (Blueprint $table) {
            $table->integer('device_id');
            $table->string('module');
            $table->string('mib');
            $table->string('included_by');
            $table->timestamp('last_modified')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->primary(['device_id','module','mib']);
        });

        \DB::statement("ALTER TABLE `device_mibs` CHANGE `last_modified` `last_modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP;");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('device_mibs');
    }
}
