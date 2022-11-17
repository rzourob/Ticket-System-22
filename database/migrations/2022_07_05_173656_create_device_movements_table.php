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
        Schema::create('device_movements', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('movement_type');  
            $table->text('body');
            $table->string('created_by');
            $table->string('newLocation');
            $table->foreignId('device_id');
            $table->foreign('device_id')->on('devices')->references('id');
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
        Schema::dropIfExists('device_movements');
    }
};
