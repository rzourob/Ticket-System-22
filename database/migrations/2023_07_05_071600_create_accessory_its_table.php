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
        Schema::create('accessory_its', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('sn');
            $table->string('image')->nullable();
            $table->string('description')->nullable();
            $table->string('Created_by');
            $table->boolean('active')->default(false);

            $table->foreignId('device_id');
            $table->foreign('device_id')->references('id')->on('devices');
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
        Schema::dropIfExists('accessory_its');
    }
};
