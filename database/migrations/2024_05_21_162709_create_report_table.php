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
        Schema::create('report', function (Blueprint $table) {
            $table->id();
            $table->string('report_reason');
            $table->string('status');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('id_comment');
            $table->unsignedBigInteger('id_dish');
            $table->timestamps();

        $table->foreign('user_id')->references('id')->on('users')
        ->cashcadeOnDelete();

        $table->foreign('id_dish')->references('id')->on('dish')
        ->cashcadeOnDelete();

        $table->foreign('id_comment')->references('id')->on('comments')
        ->cashcadeOnDelete();
        });
       
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('report');
    }
};
