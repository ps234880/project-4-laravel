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
        Schema::create('ingrediënt_pizza', function (Blueprint $table) {
            $table->unsignedBigInteger('ingrediënt_id')->index();
            $table->foreign('ingrediënt_id')->references('id')->on('ingrediënten')->cascadeOnUpdate()->cascadeOnDelete();
            $table->unsignedBigInteger('pizza_id')->index();
            $table->foreign('pizza_id')->references('id')->on('pizzas')->cascadeOnUpdate()->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ingrediënt_pizza');
    }
};
