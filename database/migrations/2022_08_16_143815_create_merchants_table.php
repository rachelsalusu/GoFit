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
        Schema::create('merchants', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('deskripsi')->nullable();
            $table->string('image')->nullable();
            $table->foreignId('status_id')->default('1')->nullable()->references('id')->on('statuses')->cascadeonDelete();
            $table->foreignId('user_id')->references('id')->on('users')->cascadeonDelete();
            $table->unsignedBigInteger('wallet')->default(0);
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
        Schema::dropIfExists('merchants');
    }
};
