<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Editar Status de Leitura</title>
</head>
<body>
    <h1>Editar Status de Leitura e Resenha</h1>

    <form action="{{ route('livros.update') }}" method="POST">
        @csrf

        <input type="hidden" name="id_livro" value="{{ $estante->id_livro }}" /> 
        <input type="hidden" name="id_usuario" value="{{ $estante->id_usuario }}" /> 
        
        <label for="status">Status de Leitura Atual</label> <br />
        <select name="status" id="status">
            <option value="Quero Ler" {{ $estante->status == 'Quero Ler' ? 'selected' : '' }}>Quero Ler</option>
            <option value="Lendo" {{ $estante->status == 'Lendo' ? 'selected' : '' }}>Lendo</option>
            <option value="Terminado" {{ $estante->status == 'Terminado' ? 'selected' : '' }}>Terminado</option>
        </select> <br />
        
        <label for="avaliacao">Avaliação (0 a 5)</label> <br />
        <input type="number" name="avaliacao" min="0" max="5" value="{{ $estante->avaliacao }}" /> <br />
        
        <label for="resenha">Resenha</label> <br />
        <textarea name="resenha" rows="5" cols="50">{{ $estante->resenha }}</textarea> <br />
        
        <br />
        <button type="submit">Salvar Alterações na Estante</button>

    </form>

</body>
</html>