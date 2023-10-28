<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Especie extends Model
{
    use HasFactory;

    protected $table = 'especies'; // Nome da tabela
    protected $primaryKey = 'id_especie'; // Chave primária da tabela

    protected $fillable = ['nome'];

    public function raca()
    {
        return $this->hasMany(Raca::class, 'id_especie', 'id_especie');
    }
}
