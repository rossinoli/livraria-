<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Editar Usuário</title>
</head>
<body>
    <h1>Editar Usuário (ID: {{ $usuario->id }})</h1>

    <form action="{{ route('usuarios.update') }}" method="POST">
        @csrf

        <input type="hidden" name="id" value="{{ $usuario->id }}" /> 
        
        <label for="">Nome de Usuário</label> <br />
        <input type="text" name="nome_usuario" value="{{ $usuario->nome_usuario }}" /> <br />
        
        <label for="">E-mail</label> <br />
        <input type="text" name="email" value="{{ $usuario->email }}" /> <br />
        
        <label for="">Nova Senha (Opcional)</label> <br />
        <input type="password" name="senha" value="" /> <br />
        
        <br />
        <button type="submit">Salvar Alterações do Usuário</button>

    </form>

</body>
</html>