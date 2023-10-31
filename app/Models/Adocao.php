<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Adocao extends Model
{
    use HasFactory;
    
    protected $table = 'adocao';
    protected $primaryKey = 'id_solicitante';
    public $timestamps = true;

    protected $fillable = [
        'nome',
        'cpf',
        'telefone',
        'email',
        'data_nasc',
        'id_animal',
    ];

    public function animal()
    {
        return $this->belongsTo(Animal::class, 'id_animal', 'id_animal');
    }
}
