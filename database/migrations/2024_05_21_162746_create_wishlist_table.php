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
        Schema::create('wishlist', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('id_dish');
            $table->timestamps();

        //user bi xoa thi wishlist cung se bi xoa
        $table->foreign('user_id')->references('id')->on('users')
        ->cashcadeOnDelete();

        $table->foreign('id_dish')->references('id')->on('dish')
        ->cashcadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('wishlist');
    }
};
