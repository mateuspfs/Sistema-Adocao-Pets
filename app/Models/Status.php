<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    use HasFactory;

    protected $table = 'status'; // Nome da tabela
    protected $primaryKey = 'id_status'; // Chave primária da tabela

    protected $fillable = ['nome'];

    public function animais()
    {
        return $this->hasMany(Animal::class, 'id_status', 'id_status');
    }
}
