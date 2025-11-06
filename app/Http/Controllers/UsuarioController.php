<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
// O Model correto para a tabela 'usuarios' é 'User'
use App\Models\User; 

class UsuarioController extends Controller
{
    // FUNÇÃO 1: MOSTRAR FORMULÁRIO
    public function create()
    {
        return view('usuarios');
    }

    // FUNÇÃO 2: SALVAR DADOS (CREATE)
    public function store(Request $request)
    {
        try {
            User::create([
                'nome_usuario' => $request->nome_usuario,
                'email'        => $request->email,
                'senha'        => $request->senha,
            ]);
            return "Usuário Cadastrado com sucesso!";

        } catch (\Throwable $th) {
            return "ERRO DE CADASTRO: " . $th->getMessage();
        }
    }

    // FUNÇÃO 3: BUSCAR E MOSTRAR DADOS (READ)
    public function show($id_usuario)
    {
        // Pede ao Model 'User' para encontrar o registro
        // Você pode usar find($id_usuario) se 'id' for a chave primária:
        $usuario = User::find($id_usuario); 

        // Se o registro não for encontrado, retorna uma página de erro
        if (!$usuario) {
            return response('Usuário não encontrado! ID: ' . $id_usuario, 404);
        }

        // Envia o registro para a view. A variável que a view recebe é 'usuario'.
        return view('show_usuarios', ['usuario' => $usuario]);
    }
    /**
     * FUNÇÃO 4: BUSCAR DADOS PARA EDIÇÃO (EDIT)
     */
    public function edit($id_usuario)
    {
        // 1. Busca o usuário pelo ID.
        $usuario = User::find($id_usuario); 

        if (!$usuario) {
            return response('Usuário não encontrado para edição! ID: ' . $id_usuario, 404);
        }

        // 2. Retorna a View de edição
        return view('edit_usuarios', ['usuario' => $usuario]);
    }

    /**
     * FUNÇÃO 5: SALVAR EDIÇÃO (UPDATE)
     */
    public function update(Request $request)
    {
        try {
            // 1. Pega o ID que veio do campo oculto do formulário
            $id_usuario_a_atualizar = $request->id;

            // 2. Localiza o registro no banco de dados
            $usuario = User::find($id_usuario_a_atualizar);

            // 3. Verifica se o usuário foi encontrado
            if (!$usuario) {
                return response('Usuário não encontrado para atualização!', 404);
            }

            // 4. Cria um array com os dados que serão atualizados
            $dados_para_update = [
                'nome_usuario' => $request->nome_usuario,
                'email'        => $request->email,
            ];

            // Se o usuário digitou algo no campo 'senha', atualiza a senha.
            // É fundamental USAR bcrypt() para hashear a senha.
            if (!empty($request->senha)) {
                 $dados_para_update['senha'] = bcrypt($request->senha);
            }

            // 5. Executa a atualização no banco de dados
            $usuario->update($dados_para_update);

            return "Usuário ID {$id_usuario_a_atualizar} atualizado com sucesso!";

        } catch (\Throwable $th) {
            return "ERRO NA ATUALIZAÇÃO: " . $th->getMessage();
        }
    }

    /**
     * FUNÇÃO 6: CARREGA VIEW DE CONFIRMAÇÃO DE EXCLUSÃO (DELETE)
     * Recebe o ID, busca o usuário e retorna a View de confirmação.
     */
     public function delete($id_usuario)
    {
        // 1. Busca o usuário pelo ID.
        $usuario = User::find($id_usuario); 

        if (!$usuario) {
            return response('Usuário não encontrado para exclusão!', 404);
        }

        // 2. Retorna a View de confirmação (que você criará em seguida)
        return view('excluir_usuarios', ['usuario' => $usuario]);
    }


    /**
     * FUNÇÃO 7: EXECUTA A EXCLUSÃO (DESTROY)
     * Recebe o ID do formulário e deleta o registro no banco de dados.
     */
    public function destroy(Request $request)
    {
        try {
            // 1. Pega o ID que veio do campo oculto do formulário
            $id_usuario_a_excluir = $request->id;

            // 2. Busca o registro e executa o comando delete().
            // Alternativa 1 (usando find):
            $usuario = User::find($id_usuario_a_excluir);
            
            if (!$usuario) {
                return response('Usuário não encontrado para exclusão!', 404);
            }
            
            $usuario->delete();
            
            // Alternativa 2 (Direta, como no seu tutorial):
            // User::where('id', $id_usuario_a_excluir)->delete();

            return "Usuário ID {$id_usuario_a_excluir} excluído com sucesso!";

        } catch (\Throwable $th) {
            return "ERRO NA EXCLUSÃO: " . $th->getMessage();
        }
    }
}


