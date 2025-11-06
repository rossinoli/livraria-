<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Excluir Usuário</title>
</head>
<body>
    <h1>Excluir Usuário (ID: {{ $usuario->id }})</h1>

    <form action="{{ route('usuarios.destroy') }}" method="POST">
        @csrf
        
        <input type="hidden" name="id" value="{{ $usuario->id }}" /> 

        <p>
            **Tem certeza que deseja excluir o usuário?** <br> 
            Nome: **{{ $usuario->nome_usuario }}** (E-mail: {{ $usuario->email }})
        </p>

        <button type="submit">Sim, Excluir Usuário</button>
        <a href="/usuarios/ver/{{ $usuario->id }}">Cancelar</a>
    </form>

</body>
</html>