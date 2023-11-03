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
        Schema::create('TUsers', function (Blueprint $table) {
            $table->bigIncrements("UserId");
            $table->unsignedSmallInteger('BranchFId');
            $table->integer("AccessLevel");
            $table->string('UserName')->unique();
            $table->string('Password');
            $table->string('FullName');
            $table->longText('AccessToken')->nullable();
            $table->boolean("Admin")->default(false);
            $table->boolean("Locked")->default(false);
            $table->string("UserType")->nullable(); 
        });
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('TUsers');
    }
};
