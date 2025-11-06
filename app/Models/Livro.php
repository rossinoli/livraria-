<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Livro extends Model
{
    // Sua tabela não usa as colunas 'created_at' e 'updated_at'
    public $timestamps = false; 

    // Sua chave primária é 'id' (padrão, mas bom confirmar)
    protected $primaryKey = 'id'; 

    // QUANDO CRIAMOS/ATUALIZAMOS, PRECISAMOS LISTAR AS COLUNAS AQUI:
    protected $fillable = [
        'titulo', 
        'auto', // Lembre-se, o nome da coluna no BD é 'auto'
        'ano_publicacao', 
        'isbn', 
        'url_capa',
    ];
}