<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Remover da Estante</title>
</head>
<body>
    <h1>Remover Livro da Estante</h1>

    <form action="{{ route('estante.destroy') }}" method="POST">
        @csrf
        
        <input type="hidden" name="id_livro" value="{{ $estante->id_livro }}" /> 
        <input type="hidden" name="id_usuario" value="{{ $estante->id_usuario }}" /> 

        <p>
            **Tem certeza que deseja remover este livro da sua estante?** (Isso apagará seu status, avaliação e resenha)
        </p>
        <p>
            Status Atual: **{{ $estante->status }}**
        </p>

        <button type="submit">Sim, Remover da Estante</button>
        <a href="/estante/ver/{{ $estante->id_livro }}">Cancelar</a>
    </form>

</body>
</html>