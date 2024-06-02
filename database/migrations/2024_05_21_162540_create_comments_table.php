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
        Schema::create('comments', function (Blueprint $table) {
            $table->id();
            $table->string('comment_description');
            $table->integer('rating');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('id_dish');
            $table->timestamps();

        //user bi xoa thi comment cung se bi xoa
        $table->foreign('user_id')->references('id')->on('users')
        ->cashcadeOnDelete();
        //user bi xoa thi bai viet (dish) cung se bi xoa
        $table->foreign('id_dish')->references('id')->on('dish')
        ->cashcadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('comments');
    }
};
