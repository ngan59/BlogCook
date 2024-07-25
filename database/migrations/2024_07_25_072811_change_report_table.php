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
            $table->unsignedBigInteger('id_comment')->nullable()->change();
            $table->unsignedBigInteger('id_dish')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('report', function (Blueprint $table) {
            $table->unsignedBigInteger('id_comment')->nullable(false)->change();
            $table->unsignedBigInteger('id_dish')->nullable(false)->change();
        });
    }
};
