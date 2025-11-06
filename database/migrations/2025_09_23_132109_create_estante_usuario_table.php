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
        Schema::create('estante_usuario', function (Blueprint $table) {
            $table->foreignId('id_usuario')->constrained('usuarios')->onDelete('cascade');
            $table->foreignId('id_livro')->constrained('livros')->onDelete('cascade');
            $table->enum('status', ['lido', 'lendo', 'quero_ler']);
            $table->tinyInteger('avaliacao')->unsigned()->nullable();
            $table->text('resenha')->nullable();
            $table->timestamps();
            $table->primary(['id_usuario', 'id_livro']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('estante_usuario');
    }
};
