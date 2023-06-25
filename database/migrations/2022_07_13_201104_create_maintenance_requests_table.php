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
        Schema::create('maintenance_requests', function (Blueprint $table) {
            $table->id();
            $table->string('tiket_no');
            $table->string('title');
            $table->longText('content')->nullable();
            $table->string('author_name')->nullable();
            $table->string('author_email')->nullable();
            $table->string('Created_by');
            $table->string('deviceTypes');
            $table->string('sn');
            $table->string('model'); 
            $table->string('room'); 
            $table->string('date');
            $table->string('mobile');
            $table->enum('status',['Todo','Done'])->default('Todo');
            $table->string('problem_id');
            $table->string('sub_problem_id');
            $table->string('department_id');
            $table->string('sub_department_id');
            // $table->foreignId('device_id');
            // $table->foreignId('department_id');
            // $table->foreignId('sub_department_id');
            // $table->foreign('device_id')->on('devices')->references('id');
            $table->foreign('department_id')->on('departments')->references('id');
            $table->foreign('problem_id')->on('problems')->references('id');
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
        Schema::dropIfExists('maintenance_requests');
    }
};
