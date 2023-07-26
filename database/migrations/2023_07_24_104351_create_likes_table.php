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
        Schema::create('likes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('manga_id');
            $table->timestamps();

            $table->unique(['user_id', 'manga_id']); // Pour s'assurer qu'un utilisateur ne peut liker un manga qu'une seule fois.
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('manga_id')->references('id')->on('mangas')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('likes');
    }
};
