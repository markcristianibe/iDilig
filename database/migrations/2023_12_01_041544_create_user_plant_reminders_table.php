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
        Schema::create('user_plant_reminders', function (Blueprint $table) {
            $table->id();
            $table->string('plant_id');
            $table->string('label');
            $table->string('activity');
            $table->string('repeat');
            $table->datetime('scheduled_at');
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
        Schema::dropIfExists('user_plant_reminders');
    }
};
