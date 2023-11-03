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
        Schema::create('TCurrencies', function (Blueprint $table) {
            $table->bigIncrements("CurrencyId");
            $table->string("CurrencyCode");
            $table->string("CurrencyName");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('TCurrencies');
    }
};
