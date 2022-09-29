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
        Schema::create('purchase_orders', function (Blueprint $table) {
            $table->id();
            $table->string('order_No');
            $table->date('date');
            $table->foreignId('department_id');
            // $table->string('applicant');
            $table->string('Created_by');
            $table->string('budget_No');
            $table->string('description');
            $table->string('currency_type');
            $table->string('item');
            $table->string('unit');
            $table->string('qty');
            $table->string('unit_price');
            $table->string('total_price');
            $table->enum('status',['Open','Closed'])->default('Open');
            $table->foreign('department_id')->on('departments')->references('id');
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
        Schema::dropIfExists('purchase_orders');
    }
};
