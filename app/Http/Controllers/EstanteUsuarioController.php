<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
// O Model correto para a tabela 'estante_usuario'
use App\Models\EstanteUsuario; 

class EstanteUsuarioController extends Controller
{
    /**
     * FUNÇÃO 1: MOSTRAR FORMULÁRIO (CREATE)
     */
    public function create()
    {
        return view('estante_usuario');
    }

    /**
     * FUNÇÃO 2: SALVAR DADOS (STORE)
     * Recebe a requisição do formulário e salva um novo registro na estante.
     */
    public function store(Request $request)
    {
        try {
            // Cria um novo registro usando o Model EstanteUsuario
            EstanteUsuario::create([
                // Campos do formulário (que devem estar no $fillable do EstanteUsuario.php)
                'id_usuario' => $request->id_usuario,
                'id_livro'   => $request->id_livro,
                'status'     => $request->status,
                'avaliacao'  => $request->avaliacao,
                'resenha'    => $request->resenha,
            ]);

            return "Livro adicionado à Estante do Usuário com sucesso!";

        } catch (\Throwable $th) {
            // Retorna o erro real do banco de dados (geralmente FK ou $fillable)
            return "ERRO DE CADASTRO NA ESTANTE: " . $th->getMessage();
        }
    }

    /**
     * FUNÇÃO 3: BUSCAR E MOSTRAR DADOS (SHOW / READ)
     * Busca o registro de um livro específico na estante de um usuário.
     * Rota: GET /estante/ver/{id_livro}
     *
     * @param  string  $id_livro O ID do livro passado na rota.
     * @return \Illuminate\View\View|\Illuminate\Http\Response
     */
    public function show($id_livro)
    {
        // NOTA: Em uma aplicação real, você obteria o ID do usuário da sessão logada.
        // Aqui, usaremos um ID fixo (ex: 1) apenas para testes de busca.
        $id_usuario_teste = 1; 

        // 1. Usa o Model EstanteUsuario para buscar a linha onde os dois IDs se cruzam
        $estante = EstanteUsuario::where('id_livro', $id_livro)
                                 ->where('id_usuario', $id_usuario_teste)
                                 ->first();

        // 2. Verifica se o registro foi encontrado
        if (!$estante) {
            return response('Registro na estante não encontrado para este livro e usuário!', 404);
        }

        // 3. Retorna a view 'show_estante', passando os dados encontrados
        return view('show_estante', ['estante' => $estante]);
    }

    /**
     * FUNÇÃO 4: BUSCAR DADOS PARA EDIÇÃO NA ESTANTE (EDIT)
     */

     public function edit($id_livro)
     {
         // NOTA: Continuamos usando um ID fixo (1) para o usuário para fins de teste.
         $id_usuario_teste = 1; 
 
         // 1. Busca o registro na estante com base em ambos os IDs (Livro e Usuário)
         $estante = EstanteUsuario::where('id_livro', $id_livro)
                                  ->where('id_usuario', $id_usuario_teste)
                                  ->first();
 
         if (!$estante) {
             return response('Registro na estante não encontrado para edição!', 404);
         }
 
         // 2. Retorna a View de edição
         return view('edit_estante', ['estante' => $estante]);
     }

     /**
      * FUNÇÃO 5: SALVAR EDIÇÃO NA ESTANTE (UPDATE)
      */
      public function update(Request $request)
    {
        try {
            // 1. Pega os IDs (chave composta) que vieram dos campos ocultos do formulário
            $id_livro_a_atualizar   = $request->id_livro;
            $id_usuario_a_atualizar = $request->id_usuario; 

            // 2. Localiza o registro no banco de dados usando a cláusula WHERE
            $estante = EstanteUsuario::where('id_livro', $id_livro_a_atualizar)
                                     ->where('id_usuario', $id_usuario_a_atualizar)
                                     ->first();

            // 3. Verifica se o registro foi encontrado
            if (!$estante) {
                return response('Registro na estante não encontrado para atualização!', 404);
            }

            // 4. Executa a atualização no banco de dados
            $estante->update([
                'status'     => $request->status,
                'avaliacao'  => $request->avaliacao,
                'resenha'    => $request->resenha,
            ]);

            return "Status do Livro ID {$id_livro_a_atualizar} para o Usuário {$id_usuario_a_atualizar} atualizado com sucesso!";

        } catch (\Throwable $th) {
            return "ERRO NA ATUALIZAÇÃO DA ESTANTE: " . $th->getMessage();
        }
    }


    /**
     * FUNÇÃO 6: CARREGA VIEW DE CONFIRMAÇÃO DE EXCLUSÃO DA ESTANTE (DELETE)
     * Recebe o ID do livro, busca o registro na estante e retorna a View de confirmação.
     * Rota: GET /estante/excluir/{id_livro}
     */
    public function delete($id_livro)
    {
        // NOTA: Usamos o ID do Usuário 1 para fins de teste.
        $id_usuario_teste = 1; 
        
        // 1. Busca o registro na estante com base em ambos os IDs (Livro e Usuário)
        $estante = EstanteUsuario::where('id_livro', $id_livro)
                                 ->where('id_usuario', $id_usuario_teste)
                                 ->first();

        if (!$estante) {
            return response('Registro na estante não encontrado para exclusão!', 404);
        }

        // 2. Retorna a View de confirmação
        return view('excluir_estante', ['estante' => $estante]);
    }


    /**
     * FUNÇÃO 7: EXECUTA A EXCLUSÃO DA ESTANTE (DESTROY)
     * Recebe os IDs do formulário e deleta o registro do relacionamento no banco.
     * Rota: POST /estante/destroy
     */
    public function destroy(Request $request)
    {
        try {
            // 1. Pega os IDs (chave composta) que vieram do campo oculto do formulário
            $id_livro_a_excluir   = $request->id_livro;
            $id_usuario_a_excluir = $request->id_usuario; 

            // 2. Executa a exclusão
            EstanteUsuario::where('id_livro', $id_livro_a_excluir)
                          ->where('id_usuario', $id_usuario_a_excluir)
                          ->delete();

            return "Registro da Estante (Livro ID {$id_livro_a_excluir}) excluído com sucesso!";

        } catch (\Throwable $th) {
            return "ERRO NA EXCLUSÃO DA ESTANTE: " . $th->getMessage();
        }
    }
}