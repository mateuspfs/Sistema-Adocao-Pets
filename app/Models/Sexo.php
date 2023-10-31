<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sexo extends Model
{
    use HasFactory;

    protected $table = 'sexo'; // Nome da tabela
    protected $primaryKey = 'id_sexo'; // Chave primária da tabela

    protected $fillable = ['nome'];

    public function animais()
    {
        return $this->hasMany(Animal::class, 'id_sexo', 'id_sexo');
    }
}
