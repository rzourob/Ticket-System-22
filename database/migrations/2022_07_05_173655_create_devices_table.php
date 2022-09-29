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
            $table->id();
            $table->string('codeDevices');
            $table->string('title');
            $table->string('deviceTypes');
            $table->string('manufacturer');
            $table->string('model');
            $table->string('sn')->nullable();
            $table->string('supplier');
            $table->string('warranty');
            $table->string('image')->nullable();
            $table->string('room');
            $table->string('description')->nullable();
            $table->string('Created_by');
            $table->boolean('active')->default(false);
            $table->foreignId('department_id');
            $table->foreignId('sub_department_id');
            $table->foreign('department_id')->on('departments')->references('id');
            $table->foreign('sub_department_id')->on('sub_departments')->references('id');
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
