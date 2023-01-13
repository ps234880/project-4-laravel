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
        Schema::create('klanten', function (Blueprint $table) {
            $table->id('id');
            $table->string('naam')->nullable(false);
            $table->string('straat')->nullable(false);
            $table->integer('huisnummer')->nullable(false);
            $table->string('postcode')->nullable(false);
            $table->string('woonplaats')->nullable(false);
            $table->string('telefoonnummer')->nullable(false);
            $table->string('e-mailadres')->nullable(false);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('klanten');
    }
};
