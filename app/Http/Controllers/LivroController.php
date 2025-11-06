<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
// Use o Model correto para esta tabela!
use App\Models\Livro; 

class LivroController extends Controller
{
    public function create()
    {
        return view('livros');
    }

    public function store(Request $request)
    {
        try {
            Livro::create([
                'titulo'          => $request->titulo,
                'auto'            => $request->autor, // Sua coluna no BD é 'auto'
                'ano_publicacao'  => $request->ano_publicacao,
                'isbn'            => $request->isbn,
                'url_capa'        => $request->url_capa,
            ]);
            return "Livro Cadastrado com sucesso!";
        } catch (\Throwable $th) {
            return "ERRO DE CADASTRO: " . $th->getMessage();
        }
    }
    
    /**
     * FUNÇÃO 3: BUSCAR E MOSTRAR DADOS (SHOW / READ)
     */
    public function show($id_livro)
    {
        // Usa o Model Livro (CORRETO!)
        $livro = Livro::find($id_livro); 

        // Se o registro não for encontrado (ID 1 não existe, por exemplo)
        if (!$livro) {
            return response('Livro não encontrado! ID: ' . $id_livro, 404);
        }

        // Retorna a view, passando o objeto $livro
        return view('show_livros', ['livro' => $livro]);
    }

    /**
     * FUNÇÃO 4: BUSCAR DADOS PARA EDIÇÃO (EDIT)
     */
    public function edit($id_livro)
    {
        // 1. Busca o livro pelo ID.
        $livro = Livro::find($id_livro); 

        if (!$livro) {
            return response('Livro não encontrado para edição! ID: ' . $id_livro, 404);
        }

        // 2. Retorna a View de edição (que você criará a seguir)
        return view('edit_livros', ['livro' => $livro]);
    }

    /**
     * FUNÇÃO 5: SALVAR EDIÇÃO (UPDATE)
     */
    public function update(Request $request)
    {
        try {
            // 1. Pega o ID que veio do campo oculto do formulário
            $id_livro_a_atualizar = $request->id;

            // 2. Localiza o registro no banco de dados
            $livro = Livro::find($id_livro_a_atualizar);

            // 3. Verifica se o livro foi encontrado antes de tentar atualizar
            if (!$livro) {
                return response('Livro não encontrado para atualização!', 404);
            }

            // 4. Executa a atualização no banco de dados
            // NOTA: 'auto' é o nome da sua coluna no BD.
            $livro->update([
                'titulo'          => $request->titulo,
                'auto'            => $request->autor, // Mapeia o campo 'autor' do form para a coluna 'auto'
                'ano_publicacao'  => $request->ano_publicacao,
                'isbn'            => $request->isbn,
                'url_capa'        => $request->url_capa,
            ]);

            return "Livro ID {$id_livro_a_atualizar} atualizado com sucesso!";

        } catch (\Throwable $th) {
            return "ERRO NA ATUALIZAÇÃO: " . $th->getMessage();
        }
    }


    /**
     * FUNÇÃO 6: CARREGA VIEW DE CONFIRMAÇÃO DE EXCLUSÃO (DELETE)
     * Recebe o ID, busca o livro e retorna a View de confirmação.
     * Rota: GET /livros/excluir/{id_livro}
     */
    public function delete($id_livro)
    {
        // 1. Busca o livro pelo ID.
        $livro = Livro::find($id_livro); 

        if (!$livro) {
            return response('Livro não encontrado para exclusão!', 404);
        }

        // 2. Retorna a View de confirmação
        return view('excluir_livros', ['livro' => $livro]);
    }


    /**
     * FUNÇÃO 7: EXECUTA A EXCLUSÃO (DESTROY)
     * Recebe o ID do formulário e deleta o registro do livro no banco de dados.
     * Rota: POST /livros/destroy
     */
    public function destroy(Request $request)
    {
        try {
            // 1. Pega o ID que veio do campo oculto do formulário
            $id_livro_a_excluir = $request->id;

            // 2. Executa a exclusão:
            $livro = Livro::find($id_livro_a_excluir);
            
            if (!$livro) {
                return response('Livro não encontrado para exclusão!', 404);
            }
            
            $livro->delete();

            return "Livro ID {$id_livro_a_excluir} excluído com sucesso!";

        } catch (\Throwable $th) {
            return "ERRO NA EXCLUSÃO DO LIVRO: " . $th->getMessage();
        }
    }
}