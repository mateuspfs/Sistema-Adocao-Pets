<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Especie;
use App\Models\Porte;
use App\Models\Raca;
use App\Models\Sexo;
use App\Models\Status;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Inserir espécies
        Especie::insert([
            ['nome' => 'Cachorro'],
            ['nome' => 'Gato'],
            ['nome' => 'Pássaro'],
            ['nome' => 'Coelho'],
            ['nome' => 'Hamster'],
        ]);

        // Inserir raças
        Raca::insert([
            ['nome' => 'Labrador', 'id_especie' => 1],    // Cachorro
            ['nome' => 'Poodle', 'id_especie' => 1],      // Cachorro
            ['nome' => 'Bulldog', 'id_especie' => 1],     // Cachorro
            ['nome' => 'Siames', 'id_especie' => 2],      // Gato
            ['nome' => 'Persa', 'id_especie' => 2],       // Gato
            ['nome' => 'Maine Coon', 'id_especie' => 2],  // Gato
            ['nome' => 'Canário', 'id_especie' => 3],    // Pássaro
            ['nome' => 'Calopsita', 'id_especie' => 3],  // Pássaro
            ['nome' => 'Holandês', 'id_especie' => 4],   // Coelho
            ['nome' => 'Mini Rex', 'id_especie' => 4],   // Coelho
            ['nome' => 'Sírio', 'id_especie' => 5],      // Hamster
            ['nome' => 'Roborovski', 'id_especie' => 5], // Hamster
        ]);

        // Inserir sexos
        Sexo::insert([
            ['nome' => 'Macho'],
            ['nome' => 'Fêmea'],
        ]);

        // Inserir portes
        Porte::insert([
            ['nome' => 'Pequeno'],
            ['nome' => 'Médio'],
            ['nome' => 'Grande'],
        ]);

        // Inserir status
        Status::insert([
            ['nome' => 'Ativo'],
            ['nome' => 'Inativo'],
        ]);
    }
}
