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
            $table->unsignedBigInteger('id_categoryreport')->nullable()->after('id_dish');
            $table->foreign('id_categoryreport')->references('id')->on('categoryreport')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('report', function (Blueprint $table) {
            $table->dropForeign(['id_categoryreport']);
            $table->dropColumn('id_categoryreport');
        });
    }
};
