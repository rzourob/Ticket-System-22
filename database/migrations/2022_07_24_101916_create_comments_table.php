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
        Schema::create('comments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('maintenancerequest_id');
            $table->foreignId('user_id')->nullable();
            $table->enum('new_status',['Todo','Done'])->default('Todo');
            $table->text('body');
            $table->string('Created_by');
            $table->foreign('user_id')->on('users')->references('id');
            $table->foreign('maintenancerequest_id')->on('maintenancerequests')->references('id');
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
        Schema::dropIfExists('comments');
    }
};
