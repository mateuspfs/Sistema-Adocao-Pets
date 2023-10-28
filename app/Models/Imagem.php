<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Imagem extends Model
{
    use HasFactory;

    protected $table = 'imagens'; // Nome da tabela
    protected $primaryKey = 'id_img'; // Chave primária da tabela

    protected $fillable = ['nome'];

    public function imagem_animal()
    {
        return $this->hasMany(Animal::class, 'id_img', 'id_img');
    }
}
