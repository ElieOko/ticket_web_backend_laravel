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
        Schema::create('TCalls', function (Blueprint $table) {
            $table->bigIncrements("CallId");
            $table->unsignedSmallInteger('CounterFId');
            $table->integer('Ticket')->nullable();
            $table->string("Note");
            $table->unsignedSmallInteger('UserFId');
            $table->string("CreatedTime");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('TCalls');
    }
};
