<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasFactory;

    protected $table = 'users'; // Nome da tabela
    protected $primaryKey = 'id_user'; // Chave primária da tabela

    protected $fillable = [
        'nome',
        'email',
        'senha',
    ];
}
