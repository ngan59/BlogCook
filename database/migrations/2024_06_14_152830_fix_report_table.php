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
        Schema::table('report', function (Blueprint $table) {

            $table->dropForeign(['user_id']);
            $table->dropForeign(['id_dish']);
            $table->dropForeign(['id_comment']);


            $table->foreign('user_id')->references('id')->on('users')->cascadeOnDelete();
            $table->foreign('id_dish')->references('id')->on('dish')->cascadeOnDelete();
            $table->foreign('id_comment')->references('id')->on('comments')
                ->cascadeOnDelete();


            $table->index('user_id');
            $table->index('id_dish');
            $table->index('id_comment');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('report', function (Blueprint $table) {

            $table->dropForeign(['user_id']);
            $table->dropForeign(['id_dish']);
            $table->dropForeign(['id_comment']);


            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('id_dish')->references('id')->on('dish');
            $table->foreign('id_comment')->references('id')->on('comments');

            $table->index('user_id');
            $table->index('id_dish');
            $table->index('id_comment');
        });
    }
};
