<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model; 
// Altere para apenas 'Model', se você não for usar o sistema de login/autenticação

// Remova as importações: HasFactory, Authenticatable, Notifiable

class User extends Model // Use apenas 'Model'
{
    // Remova o uso de traits, se não precisar de autenticação
    // use HasFactory, Notifiable; 

    // A. Mapeia para sua tabela 'usuarios'
    protected $table = 'usuarios';

    // B. Desativa colunas de tempo (se sua tabela não as tiver)
    public $timestamps = false; 

    /**
     * The attributes that are mass assignable (O QUE PODE SER INSERIDO).
     * ESSENCIAL para create() e update().
     */
    protected $fillable = [
        'nome_usuario',
        'email',
        'senha', // Permite que a senha seja atualizada
    ];

    // Remova as seções 'protected $hidden' e 'protected function casts()' 
    // se você não for usar a autenticação padrão do Laravel.
}