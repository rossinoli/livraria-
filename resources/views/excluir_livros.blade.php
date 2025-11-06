<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Excluir Livro</title>
</head>
<body>
    <h1>Excluir Livro (ID: {{ $livro->id }})</h1>

    <form action="{{ route('livros.destroy') }}" method="POST">
        @csrf
        
        <input type="hidden" name="id" value="{{ $livro->id }}" /> 

        <p>
            **Tem certeza que deseja excluir o livro?** <br> 
            Título: **{{ $livro->titulo }}** (Autor: {{ $livro->auto }})
        </p>

        <button type="submit">Sim, Excluir Livro</button>
        <a href="/livros/ver/{{ $livro->id }}">Cancelar</a>
    </form>

</body>
</html>