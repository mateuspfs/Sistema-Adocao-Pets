<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Raca extends Model
{
    use HasFactory;

    protected $table = 'racas'; // Nome da tabela
    protected $primaryKey = 'id_raca'; // Chave primária da tabela

    protected $fillable = [
        'nome',
        'id_especie'
    ];

    public function especie()
    {
        return $this->belongsTo(Especie::class, 'id_especie', 'id_especie');
    }

    public function animais()
    {
        return $this->hasMany(Animal::class, 'id_raca', 'id_raca');
    }
}
