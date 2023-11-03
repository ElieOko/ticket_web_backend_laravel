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
        Schema::create('TOrderNumbers', function (Blueprint $table) {
            $table->bigIncrements("OrderNumberId");
            $table->unsignedSmallInteger('TransferTypeFId');
            $table->unsignedSmallInteger('BranchFId');
            $table->integer('Number')->nullable();
            $table->string("CreatedDate");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('TOrderNumbers');
    }
};
