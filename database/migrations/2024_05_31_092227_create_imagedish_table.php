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
        Schema::create('imagedish', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_dish');
            $table->string('image');
            $table->timestamps();

            $table->foreign('id_dish')->references('id')->on('dish')
            ->cashcadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('imagedish');
    }
};
