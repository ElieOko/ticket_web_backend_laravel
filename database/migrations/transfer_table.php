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
        Schema::create('TTransfers', function (Blueprint $table) {
            $table->bigIncrements("TransfertId");

            $table->unsignedSmallInteger("TransferTypeFId");
            $table->unsignedSmallInteger("TransferStatusFId");
            $table->unsignedSmallInteger("BranchFId");
            $table->unsignedSmallInteger("CurrencyFId");
            $table->unsignedSmallInteger("IntervalFId");
            $table->unsignedSmallInteger("CardFId");
            $table->unsignedSmallInteger('CallUserFId');
            $table->unsignedSmallInteger('CompleteUserFId');

            $table->integer('FromBranchId');
            $table->integer('ToBranchId');
            $table->integer("OrderNumber");
            $table->double('Amount', 12, 7);
            $table->boolean('Completed')->nullable()->default(false);

            $table->string("CompleteNote")->nullable();
            $table->string("DateCompleted")->nullable();
            $table->string("Address")->nullable();

            $table->string("SenderName")->nullable();
            $table->string('SenderPhone')->nullable();
            $table->string("ReceiverName")->nullable();
            $table->string("ReceiverPhone")->nullable();

            $table->string("Code")->nullable();
            $table->string("Note")->nullable();
            $table->string("Barcode")->nullable();
            $table->string("CardExpiryDate")->nullable();
            $table->string("TokenPath")->nullable();

            $table->string("ImagePath")->nullable();
            $table->string("Signature")->nullable();
            $table->string("UniqueString")->unique();
            $table->string("DateCreated")->nullable();
            $table->string("TimeCalled")->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('TTransfers');
    }
};
