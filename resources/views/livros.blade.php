<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie-edge">
    <title>
        Cadastrar novo Livro
    </title>
</head>
<body>
    <form action="{{ route('livros.store') }}" method="post">
        @csrf
        
        <label for=""> Título </label> <br />
        <input type="text" name="titulo"> <br />
        
        <label for=""> Autor </label> <br />
        <input type="text" name="autor"> <br />
        
        <label for=""> Ano de Publicação </label> <br />
        <input type="number" name="ano_publicacao" maxlength="4"> <br />
        
        <label for=""> ISBN </label> <br />
        <input type="text" name="isbn" maxlength="13"> <br />
        
        <label for=""> URL da Capa </label> <br />
        <input type="url" name="url_capa"> <br />
        
        <button> Cadastrar </button>
    </form>
</body>
</html>