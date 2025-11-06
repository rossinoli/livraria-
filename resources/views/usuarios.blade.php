<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie-edge">
    <title>
        Cadastrar novo Usuário
    </title>
</head>
<body>
    <form action="{{ route('usuarios.store') }}" method="post">
        @csrf
        
        <label for=""> Nome de Usuário </label> <br />
        <input type="text" name="nome_usuario"> <br />
        
        <label for=""> E-mail </label> <br />
        <input type="email" name="email"> <br />
        
        <label for=""> Senha </label> <br />
        <input type="password" name="senha"> <br />
        
        <button> Cadastrar </button>
    </form>
</body>
</html>