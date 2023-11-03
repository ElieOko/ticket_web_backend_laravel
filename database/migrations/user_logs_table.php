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
        Schema::create('TUserLogs', function (Blueprint $table) {
            $table->bigIncrements("UserLogId");
            $table->unsignedSmallInteger("UserFId");
            $table->string("ClientType");
            $table->string("ClientIpAddress");
            $table->string("AccessType");
            $table->string("LogTime");
        });
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('TUserLogs');
    }
};
