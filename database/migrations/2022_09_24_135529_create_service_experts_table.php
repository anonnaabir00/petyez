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
        Schema::create('service_experts', function (Blueprint $table) {
            $table->id();
            $table->string('full_name');
            $table->longText('short_description')->nullable();
            $table->longText('expert_overview')->nullable();
            $table->integer('expert_experience')->nullable();
            $table->longText('expert_image')->nullable();
            $table->longText('expert_address')->nullable();
            $table->string('expert_phone')->nullable();
            $table->string('expert_email')->nullable();
            $table->string('working_hours')->nullable();
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
        Schema::dropIfExists('service_experts');
    }
};
