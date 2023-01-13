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
        Schema::create('bestellingen', function (Blueprint $table) {
            $table->id('id');
            $table->string('bon')->nullable(false);
            $table->unsignedBigInteger('bestelstatus_id')->index();
            $table->foreign('bestelstatus_id')->references('id')->on('bestelstatus')->cascadeOnDelete()->cascadeOnUpdate();
            $table->bigInteger('klant_id')->unsigned();
            $table->foreign('klant_id')->references('id')->on('klanten')->cascadeOnDelete()->cascadeOnUpdate();
            
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
