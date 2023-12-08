<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('devices', function (Blueprint $table) {
            $table->string('serial_no')->unique()->id();
            $table->string('user_id');
            $table->string('plant_id');
            $table->float('light_intensity');
            $table->float('temperature');
            $table->float('humidity');
            $table->float('soil_moisture');
            $table->float('water_level_1');
            $table->float('water_level_2');
            $table->float('water_level_3');
            $table->integer('waterpump_status');
            $table->string('type');
            $table->string('status');
            $table->string('mac_address');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('devices');
    }
};
