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
        Schema::create('dish', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('description');
            $table->integer('view_count')->default(0);
            $table->string('image');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('id_category');
            $table->boolean('highlight_post');
            $table->timestamps();


            //khi user xóa thì tất cả các bài viết cũng bị xóa theo
            $table->foreign('user_id')->references('id')->on('users')
            ->cashcadeOnDelete();
            //danh mục
            $table->foreign('id_category')->references('id')->on('categories')
            ->cashcadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dish');
    }
};
