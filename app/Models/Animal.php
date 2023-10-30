<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Animal extends Model
{
    use HasFactory;

    protected $table = 'animais';
    protected $primaryKey = 'id_animal';
    public $timestamps = true;
    
    protected $fillable = [
        'nome',
        'idade',
        'peso',
        'sobre',
        'sexo',
        'endereco',
        'id_status',
        'id_porte',
        'id_sexo',
        'id_raca',
    ];

    public function status()
    {
        return $this->belongsTo(Status::class, 'id_status', 'id_status');
    }

    public function porte()
    {
        return $this->belongsTo(Porte::class, 'id_porte', 'id_porte');
    }

    public function raca()
    {
        return $this->belongsTo(Raca::class, 'id_raca', 'id_raca');
    }

    public function imagem_animal()
    {
        return $this->hasMany(Animal::class, 'id_animal', 'id_animal');
    }
}
