<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Editar Livro</title>
</head>
<body>
    <h1>Editar Livro (ID: {{ $livro->id }})</h1>

    <form action="{{ route('livros.update') }}" method="POST">
        @csrf

        <input type="hidden" name="id" value="{{ $livro->id }}" /> 
        
        <label for="">Título</label> <br />
        <input type="text" name="titulo" value="{{ $livro->titulo }}" /> <br />
        
        <label for="">Autor</label> <br />
        <input type="text" name="autor" value="{{ $livro->auto }}" /> <br />
        
        <label for="">Ano de Publicação</label> <br />
        <input type="text" name="ano_publicacao" value="{{ $livro->ano_publicacao }}" /> <br />
        
        <label for="">ISBN</label> <br />
        <input type="text" name="isbn" value="{{ $livro->isbn }}" /> <br />
        
        <label for="">URL da Capa</label> <br />
        <input type="text" name="url_capa" value="{{ $livro->url_capa }}" /> <br />
        
        <br />
        <button type="submit">Salvar Alterações</button>

    </form>

</body>
</html>