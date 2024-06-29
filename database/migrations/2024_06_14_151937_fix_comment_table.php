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
        Schema::table('comments', function (Blueprint $table) {

            $table->dropForeign(['user_id']);
            $table->dropForeign(['id_dish']);


            $table->foreign('user_id')->references('id')->on('users')->cascadeOnDelete();
            $table->foreign('id_dish')->references('id')->on('dish')->cascadeOnDelete();


            $table->index('user_id');
            $table->index('id_dish');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('comments', function (Blueprint $table) {

            $table->dropForeign(['user_id']);
            $table->dropForeign(['id_dish']);


            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('id_dish')->references('id')->on('dish');

            $table->dropIndex(['user_id']);
            $table->dropIndex(['id_dish']);
        });
    }
};
