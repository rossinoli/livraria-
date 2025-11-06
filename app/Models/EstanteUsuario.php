<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EstanteUsuario extends Model
{
    use HasFactory;
    
    // Nome da tabela (pode ser omitido se o nome for 'estante_usuarios')
    protected $table = 'estante_usuario';
    
    // Desativa colunas de tempo
    public $timestamps = false;

    // Permite a atribuição em massa desses campos
    protected $fillable = [
        'id_usuario',
        'id_livro',
        'status',
        'avaliacao',
        'resenha',
    ];
    
    // A chave primária é composta. O Laravel precisa que você defina a chave primária
    // como null ou uma coluna, mas para chaves compostas, este é um ponto complexo
    // que pode exigir um Model Pivo ou desativar a chave primária:
    protected $primaryKey = null;
    public $incrementing = false;
}