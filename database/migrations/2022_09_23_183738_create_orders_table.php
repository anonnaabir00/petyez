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
        Schema::create('orders', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('product_id');
            $table->string('variation_id')->nullable();
            $table->string('customer_id')->nullable();
            $table->integer('product_qty')->nullable();
            $table->integer('total_price')->nullable();
            $table->integer('shipping_amount')->nullable();
            $table->longText('shipping_address');
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
        Schema::dropIfExists('orders');
    }
};
