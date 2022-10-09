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
        Schema::create('service_booking', function (Blueprint $table) {
            $table->bigIncrements('order_id');
            $table->string('customer_id')->nullable();
            $table->string('service_id')->nullable();
            $table->string('start_date')->nullable();
            $table->string('start_time')->nullable();
            $table->integer('duration')->nullable();
            $table->integer('total_price')->nullable();
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
        Schema::dropIfExists('service_booking');
    }
};
