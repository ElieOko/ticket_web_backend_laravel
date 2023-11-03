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
        Schema::create('TTransferTypes', function (Blueprint $table) {
            $table->bigIncrements("TransferTypeId");
            $table->string("Name");
            $table->string("Code");
            $table->string("DisplayName");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('TTransferTypes');
    }
};
