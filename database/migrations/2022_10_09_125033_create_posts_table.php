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
        Schema::create('posts', function (Blueprint $table) {
            $table->string('id', 255)->nullable();
            $table->string('uid', 255)->nullable();
            $table->string('street')->nullable();
            $table->string('city')->nullable();
            $table->string('state')->nullable();
            $table->double('latitude')->nullable();
            $table->double('longitude')->nullable();
            $table->string('geohash')->nullable();
            $table->string('animal_age')->nullable();
            $table->string('animal_type')->nullable();
            $table->string('animal_breed')->nullable();
            $table->string('animal_gender')->nullable();
            $table->string('animal_size')->nullable();
            $table->json('animal_images')->nullable();
            $table->boolean('animal_registered')->nullable();
            $table->boolean('animal_vaccinated')->nullable();
            $table->string('author_name')->nullable();
            $table->string('author_uid')->nullable();
            $table->string('author_phone')->nullable();
            $table->string('author_image')->nullable();
            $table->string('description')->nullable();
            $table->integer('price')->nullable();
            $table->string('tag')->nullable();
            $table->json('kci_documents')->nullable();
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
        Schema::dropIfExists('posts');
    }
};
