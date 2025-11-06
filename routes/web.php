<?php

use Illuminate\Support\Facades\Route;
// Importar os Controllers para que o Laravel saiba onde encontrá-los
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\LivroController;
use App\Http\Controllers\EstanteUsuarioController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return view('welcome');
});

// -------------------------------------------------------------------------
// Rotas para a Tabela USUÁRIOS
// -------------------------------------------------------------------------

// Rota GET: Mostra o formulário de cadastro de usuário
Route::get('/usuarios/novo', [UsuarioController::class, 'create'])->name('usuarios.create');

// Rota POST: Envia os dados do formulário para salvar um novo usuário
Route::post('/usuarios/novo/store', [UsuarioController::class, 'store'])->name('usuarios.store');

// Rota para buscar e exibir um USUÁRIO por ID
Route::get('/usuarios/ver/{id_usuario}', [UsuarioController::class, 'show'])->name('usuarios.show');

// Rota para carregar o formulário preenchido para EDIÇÃO de um USUÁRIO
Route::get('/usuarios/editar/{id_usuario}', [UsuarioController::class, 'edit'])->name('usuarios.edit');

// Rota POST para SALVAR a EDIÇÃO de um USUÁRIO
Route::post('/usuarios/update', [UsuarioController::class, 'update'])->name('usuarios.update');


// -------------------------------------------------------------------------
// Rotas para a Tabela LIVROS
// -------------------------------------------------------------------------

// Rota GET: Mostra o formulário de cadastro de livro
Route::get('/livros/novo', [LivroController::class, 'create'])->name('livros.create');

// Rota POST: Envia os dados do formulário para salvar um novo livro
Route::post('/livros/novo/store', [LivroController::class, 'store'])->name('livros.store');

// Rota para buscar e exibir um LIVRO por ID
Route::get('/livros/ver/{id_livro}', [LivroController::class, 'show'])->name('livros.show');

// Rota para carregar o formulário preenchido para EDIÇÃO de um LIVRO
Route::get('/livros/editar/{id_livro}', [LivroController::class, 'edit'])->name('livros.edit');

// Rota POST para SALVAR a EDIÇÃO de um LIVRO
Route::post('/livros/update', [LivroController::class, 'update'])->name('livros.update');


// -------------------------------------------------------------------------
// Rotas para a Tabela ESTANTE DO USUÁRIO
// -------------------------------------------------------------------------

// Rota GET: Mostra o formulário de adição à estante
Route::get('/estante/adicionar', [EstanteUsuarioController::class, 'create'])->name('estante.create');

// Rota POST: Envia os dados do formulário para adicionar à estante
Route::post('/estante/adicionar/store', [EstanteUsuarioController::class, 'store'])->name('estante.store');

// Rota para buscar e exibir a ficha de um item da ESTANTE
Route::get('/estante/ver/{id_livro}', [EstanteUsuarioController::class, 'show'])->name('estante.show');

// Rota para carregar o formulário preenchido para EDIÇÃO na ESTANTE
Route::get('/estante/editar/{id_livro}', [EstanteUsuarioController::class, 'edit'])->name('estante.edit');

// Rota POST para SALVAR a EDIÇÃO na ESTANTE (status/resenha)
Route::post('/estante/update', [EstanteUsuarioController::class, 'update'])->name('estante.update');


// -------------------------------------------------------------------------
// Rotas de EXCLUSÃO (DELETE) - Confirmação (GET)
// -------------------------------------------------------------------------

// Rota GET para a tela de confirmação de exclusão do USUÁRIO
Route::get('/usuarios/excluir/{id_usuario}', [UsuarioController::class, 'delete'])->name('usuarios.delete');

// Rota GET para a tela de confirmação de exclusão do LIVRO
Route::get('/livros/excluir/{id_livro}', [LivroController::class, 'delete'])->name('livros.delete');

// Rota GET para a tela de confirmação de exclusão da ESTANTE
Route::get('/estante/excluir/{id_livro}', [EstanteUsuarioController::class, 'delete'])->name('estante.delete');



// -------------------------------------------------------------------------
// Rotas de EXCLUSÃO (DELETE) - Execução (POST)
// -------------------------------------------------------------------------

// Rota POST para EXECUTAR a exclusão do USUÁRIO
Route::post('/usuarios/destroy', [UsuarioController::class, 'destroy'])->name('usuarios.destroy');

// Rota POST para EXECUTAR a exclusão do LIVRO
Route::post('/livros/destroy', [LivroController::class, 'destroy'])->name('livros.destroy');

// Rota POST para EXECUTAR a exclusão da ESTANTE
Route::post('/estante/destroy', [EstanteUsuarioController::class, 'destroy'])->name('estante.destroy');

