<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Porte extends Model
{
   use HasFactory;

   protected $table = 'portes'; // Nome da tabela
   protected $primaryKey = 'id_porte'; // Chave primária da tabela

   protected $fillable = ['nome'];

   public function animais()
   {
       return $this->hasMany(Animal::class, 'id_porte', 'id_porte');
   }
}
