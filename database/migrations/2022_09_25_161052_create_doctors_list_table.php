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
        Schema::create('doctors_list', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('full_name');
            $table->longText('doctor_type')->nullable();
            $table->longText('doctor_degree')->nullable();
            $table->integer('doctor_experience')->nullable();
            $table->longText('doctor_image')->nullable();
            $table->longText('clinic_address')->nullable();
            $table->integer('online_fee')->nullable();
            $table->integer('clinic_fee')->nullable();
            $table->integer('total_reviews')->nullable();
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
        Schema::dropIfExists('doctors_list');
    }
};
