<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('comments', function (Blueprint $table) {
            DB::statement('ALTER TABLE comments ADD CONSTRAINT rating_check CHECK (rating >= 1 AND rating <= 5)');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('comments', function (Blueprint $table) {
            DB::statement('ALTER TABLE comments ADD CONSTRAINT rating_check CHECK (rating >= 1 AND rating <= 5)');
        });
    }
};
