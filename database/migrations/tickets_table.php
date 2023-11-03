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
        Schema::create('TTickets', function (Blueprint $table) {
            $table->integer("TicketId")->unique();
            $table->unsignedSmallInteger('CurrencyFId');
            $table->unsignedSmallInteger('TransferTypeFId');
            $table->unsignedSmallInteger('TransferStatusFId');
            $table->unsignedSmallInteger('UserFId');
            $table->string('Name');
            $table->integer("Amount");
            $table->string("Phone")->nullable();
            $table->string("Motif")->nullable();
            $table->string("Note")->nullable();
            $table->string("DateCreated")->nullable();
            $table->string("ClotureDateCreated")->nullable();
        });
    }
//Tokyo ghoul
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('TTickets');
    }
};
