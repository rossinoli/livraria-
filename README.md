## 📚 Sistema de Gerenciamento de Estante Virtual em Laravel (CRUD)
Este projeto é uma demonstração completa da arquitetura Model-View-Controller (MVC) usando o framework Laravel. Ele implementa todas as operações do CRUD (Create, Read, Update, Delete) para três entidades centrais: Usuários, Livros e a Estante de Leitura.

#### 🎯 Funcionalidades e Estrutura
O sistema é focado em simular uma estante virtual onde um usuário pode gerenciar seu progresso de leitura.

| Entidade | Funções CRUD Implementadas | Rota de Exemplo |
| :--- | :--- | :--- |
| **Usuário** | Cadastro, Visualização, Edição, Exclusão (via delete() e destroy()) | /usuarios/novo, /usuarios/editar/{id} |
| **Livro** | Cadastro, Visualização, Edição, Exclusão | /livros/novo, /livros/excluir/{id} |
| **Estante (Relacionamento)** | Adicionar, Visualizar Status/Resenha, Atualizar Status, Remover da Estante | /estante/ver/{id_livro}, /estante/editar/{id_livro} |

#### 🛠️ Configurações e Tecnologias

* **Framework:** Laravel
* **Banco de Dados:** MySQL (ou outro SGBD compatível)
* **Padrão:** Model-View-Controller (MVC)
* **Manipulação de Dados:** Eloquent ORM

### ⚙️ Instruções de Instalação (Setup)

Para rodar o projeto em sua máquina local, siga os passos abaixo:

1.  **Clone o Repositório:**
    ```bash
    git clone [https://github.com/rossinoli/livraria-.git]
    cd livraria-
    ```
2.  **Instale as Dependências do Composer:**
    ```bash
    composer install
    ```
3.  **Configure o Ambiente (`.env`):**
    * Copie o arquivo de exemplo: `cp .env.example .env`
    * Gere a chave da aplicação: `php artisan key:generate`
    * Edite o arquivo `.env` para configurar as credenciais do seu banco de dados.
4.  **Execute as Migrations:**
    ```bash
    php artisan migrate
    ```
5.  **Inicie o Servidor de Desenvolvimento:**
    ```bash
    php artisan serve
    ```

| Ação | Rota GET | Rota POST (CRUD) | Controller Envolvido |
| :--- | :--- | :--- | :--- |
| **Criar Novo** | `/usuarios/novo` | `/usuarios/store` | `UsuarioController@store` |
| **Ver Detalhes** | `/livros/ver/{id}` | N/A | `LivroController@show` |
| **Editar/Atualizar** | `/estante/editar/{id_livro}` | `/estante/update` | `EstanteUsuarioController@update` |
| **Confirmar Exclusão** | `/usuarios/excluir/{id}` | N/A | `UsuarioController@delete` |
| **Executar Exclusão** | N/A | `/livros/destroy` | `LivroController@destroy` |

    
