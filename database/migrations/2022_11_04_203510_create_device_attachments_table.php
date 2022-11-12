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
        Schema::create('device_attachments', function (Blueprint $table) {
            $table->id();

            $table->string('file_name')->nullable();
            // $table->string('form_no')->nullable();
            $table->string('Created_by', 100);
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
        Schema::dropIfExists('device_attachments');
    }
};
