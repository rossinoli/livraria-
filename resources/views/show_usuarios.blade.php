<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Visualizar Usuário</title>
</head>
<body>
    <h1>Visualizar um Usuário</h1>

    <label for="">ID do Usuário</label> <br />
    <input type="text" name="id_usuario" value="{{ $usuario->id }}" /> <br />
    
    <label for="">Nome do Usuário</label> <br />
    <input type="text" name="nome_usuario" value="{{ $usuario->nome_usuario }}" /> <br />
    
    <label for="">E-mail</label> <br />
    <input type="text" name="email" value="{{ $usuario->email }}" /> <br />

    </body>
</html>