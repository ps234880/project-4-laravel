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
        Schema::create('order_line', function (Blueprint $table) {
            $table->id('id');

            // order_id
            $table->unsignedBigInteger('order_id')->index();
            $table->foreign('order_id')->references('id')->on('orders')->cascadeOnDelete()->cascadeOnUpdate();

            // pizza_id
            $table->unsignedBigInteger('pizza_id')->index();
            $table->foreign('pizza_id')->references('id')->on('pizzas')->cascadeOnDelete()->cascadeOnUpdate();

            $table->unsignedBigInteger('size_id')->index();
            $table->foreign('size_id')->references('id')->on('sizes')->cascadeOnDelete()->cascadeOnUpdate();

            $table->unsignedBigInteger('amount');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bestellingen');
    }
};
