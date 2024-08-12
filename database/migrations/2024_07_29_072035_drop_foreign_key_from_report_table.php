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
           $table->dropForeign(['id_dish']);
           $table->dropColumn('id_dish');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('report', function (Blueprint $table) {
            $table->unsignedBigInteger('id_dish');
            $table->foreign('id_dish')->references('id')->on('dish')
                ->cascadeOnDelete();
        });
    }
};
