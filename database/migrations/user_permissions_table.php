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
        Schema::create('TUserPermissions', function (Blueprint $table) {
            $table->bigIncrements('UserPermissionId');
            $table->unsignedSmallInteger("UserFId");
            $table->unsignedSmallInteger("TransferTypeFId");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('TUserPermissions');
    }
};
