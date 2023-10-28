<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Imagem_Animal extends Model
{
    use HasFactory;

    protected $table = 'imagens_animal'; // nome da tabela no banco
    protected $primaryKey = 'id_animal_img'; // chave primária da tabela

    protected $fillable = [
        'id_img',
        'id_animal',
    ];

    // Relações com outras tabelas
    public function animal()
    {
        return $this->belongsTo(Animal::class, 'id_animal', 'id_animal');
    }

    public function imagem()
    {
        return $this->belongsTo(Imagem::class, 'id_img', 'id_img');
    }
}
