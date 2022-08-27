<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transfer_wallets', function (Blueprint $table) {
            $table->id();
            $table->string('bank_name');
            $table->string('bank_account_number');
            $table->unsignedBigInteger('price')->default(0);
            $table->foreignId('merchant_id')->references('id')->on('merchants');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transfer_wallets');
    }
};
