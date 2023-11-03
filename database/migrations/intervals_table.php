<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('TIntervals', function (Blueprint $table) {
            $table->bigIncrements("IntervalId");
            $table->unsignedSmallInteger('TransferTypeFId');
            $table->unsignedSmallInteger('CurrencyFId');
            $table->integer("Min")->nullable();
            $table->integer("Max")->nullable();     
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('TIntervals');
    }
};
