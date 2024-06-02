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
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->string('description');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('eventcategories_id');
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')
            ->cashcadeOnDelete();

            $table->foreign('eventcategories_id')->references('id')->on('categoriesEvent')
            ->cashcadeOnDelete();
            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('events');
    }
};
