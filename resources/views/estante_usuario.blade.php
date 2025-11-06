<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie-edge">
    <title>
        Adicionar Livro à Estante
    </title>
</head>
<body>
    <form action="{{ route('estante.store') }}" method="post">
        @csrf
        
        <label for=""> ID do Usuário </label> <br />
        <input type="number" name="id_usuario"> <br />
        
        <label for=""> ID do Livro </label> <br />
        <input type="number" name="id_livro"> <br />
        
        <label for=""> Status </label> <br />
        <select name="status">
            <option value="quero_ler"> Quero Ler </option>
            <option value="lendo"> Lendo </option>
            <option value="lido"> Lido </option>
        </select> <br /> <br />
        
        <label for=""> Avaliação (1 a 10) </label> <br />
        <input type="number" name="avaliacao" min="1" max="10"> <br />
        
        <label for=""> Resenha </label> <br />
        <textarea name="resenha" rows="5" cols="40"></textarea> <br />
        
        <button> Salvar na Estante </button>
    </form>
</body>
</html>