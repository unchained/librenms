<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateMempoolsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mempools', function (Blueprint $table) {
            $table->integer('mempool_id', true);
            $table->string('mempool_index', 16);
            $table->integer('entPhysicalIndex')->nullable();
            $table->integer('hrDeviceIndex')->nullable();
            $table->string('mempool_type', 32);
            $table->integer('mempool_precision')->default(1);
            $table->string('mempool_descr', 64);
            $table->integer('device_id')->index('device_id');
            $table->integer('mempool_perc');
            $table->bigInteger('mempool_used');
            $table->bigInteger('mempool_free');
            $table->bigInteger('mempool_total');
            $table->bigInteger('mempool_largestfree')->nullable();
            $table->bigInteger('mempool_lowestfree')->nullable();
            $table->boolean('mempool_deleted')->default(0);
            $table->integer('mempool_perc_warn')->nullable()->default(75);
        });

        \DB::statement("ALTER TABLE `mempools` CHANGE `mempool_used` `mempool_used` bigint(16) NOT NULL ;");
        \DB::statement("ALTER TABLE `mempools` CHANGE `mempool_free` `mempool_free` bigint(16) NOT NULL ;");
        \DB::statement("ALTER TABLE `mempools` CHANGE `mempool_total` `mempool_total` bigint(16) NOT NULL ;");
        \DB::statement("ALTER TABLE `mempools` CHANGE `mempool_largestfree` `mempool_largestfree` bigint(16) NULL ;");
        \DB::statement("ALTER TABLE `mempools` CHANGE `mempool_lowestfree` `mempool_lowestfree` bigint(16) NULL ;");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('mempools');
    }
}
