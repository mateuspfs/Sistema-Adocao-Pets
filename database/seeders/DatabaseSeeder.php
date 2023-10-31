<?php

namespace Database\Seeders;

use App\Models\Adocao;
use App\Models\Animal;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Especie;
use App\Models\Imagem;
use App\Models\Imagem_Animal;
use App\Models\Porte;
use App\Models\Raca;
use App\Models\Sexo;
use App\Models\Status;
use App\Models\User;
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
            [
                'nome' => 'Cachorro'],
            [
                'nome' => 'Gato'],
            [
                'nome' => 'Pássaro'],
            [
                'nome' => 'Coelho'],
            [
                'nome' => 'Hamster'],
        ]);

        // Inserir raças
        Raca::insert([
            [
                'nome' => 'Labrador', 'id_especie' => 1],    // Cachorro
            [
                'nome' => 'Poodle', 'id_especie' => 1],      // Cachorro
            [
                'nome' => 'Bulldog', 'id_especie' => 1],     // Cachorro
            [
                'nome' => 'Siames', 'id_especie' => 2],      // Gato
            [
                'nome' => 'Persa', 'id_especie' => 2],       // Gato
            [
                'nome' => 'Maine Coon', 'id_especie' => 2],  // Gato
            [
                'nome' => 'Canário', 'id_especie' => 3],    // Pássaro
            [
                'nome' => 'Calopsita', 'id_especie' => 3],  // Pássaro
            [
                'nome' => 'Holandês', 'id_especie' => 4],   // Coelho
            [
                'nome' => 'Mini Rex', 'id_especie' => 4],   // Coelho
            [
                'nome' => 'Sírio', 'id_especie' => 5],      // Hamster
            [
                'nome' => 'Roborovski', 'id_especie' => 5], // Hamster
        ]);

        // Inserir portes
        Porte::insert([
            [
                'nome' => 'Pequeno'],
            [
                'nome' => 'Médio'],
            [
                'nome' => 'Grande'],
        ]);

        // Inserir portes
        Sexo::insert([
            [
                'nome' => 'Fêmea'],
            [
                'nome' => 'Macho'],
        ]);

        // Inserir status
        Status::insert([
            [
                'nome' => 'Ativo'],
            [
                'nome' => 'Inativo'],
        ]);

        // Inserir dados na tabela users
        User::insert([
            [
                'nome' => 'João Silva', 
                'email' => 'joao@email.com', 
                'senha' => '123'
            ],
            [
                'nome' => 'Maria Santos', 
                'email' => 'maria@email.com', 
                'senha' => '123'
            ],
            [
                'nome' => 'Carlos Pereira', 
                'email' => 'carlos@email.com', 
                'senha' => '123'
            ],
            [
                'nome' => 'Ana Oliveira', 
                'email' => 'ana@email.com', 
                'senha' => '123'
            ],
            [
                'nome' => 'Pedro Rodrigues', 
                'email' => 'pedro@email.com', 
                'senha' => '123'
            ],
            [
                'nome' => 'Lúcia Souza', 
                'email' => 'lucia@email.com', 
                'senha' => '123'
            ],
            [
                'nome' => 'Fernando Costa', 
                'email' => 'fernando@email.com', 
                'senha' => '123'
            ],
            [
                'nome' => 'Sofia Alves', 
                'email' => 'sofia@email.com', 
                'senha' => '123'
            ],
            [
                'nome' => 'Miguel Pereira', 
                'email' => 'miguel@email.com', 
                'senha' => '123'
            ],
            [
                'nome' => 'Isabela Santos', 
                'email' => 'isabela@email.com', 
                'senha' => '123'
            ],
        ]);

        // Inserir dados na tabela animais
        Animal::insert([
            [
                'nome' => 'Rex', 
                'idade' => 2, 
                'peso' => 12, 
                'sobre' => 'Um cachorro muito brincalhão', 
                'endereco' => '123 
                Rua das Flores', 
                'id_sexo' => 2, 
                'id_status' => 1, 
                'id_porte' => 1, 
                'id_raca' => 1],
            [
                'nome' => 'Branquinha', 
                'idade' => 3, 
                'peso' => 8, 
                'sobre' => 'Gatinha fofa e dócil', 
                'endereco' => '456 Avenida dos Pássaros', 
                'id_sexo' => 1, 
                'id_status' => 1, 
                'id_porte' => 2, 
                'id_raca' => 4],
            [
                'nome' => 'Pikachu', 
                'idade' => 1, 
                'peso' => 0.5, 
                'sobre' => 'Adorável pássaro amarelo', 
                'endereco' => '789 Rua das Aves', 
                'id_sexo' => 2, 
                'id_status' => 1, 
                'id_porte' => 1, 
                'id_raca' => 7],
            [
                'nome' => 'Coelhinho', 
                'idade' => 0.5, 
                'peso' => 1, 
                'sobre' => 'Coelho branco de olhos vermelhos', 
                'endereco' => '1010 Rua dos Coelhos', 
                'id_sexo' => 2, 
                'id_status' => 1, 
                'id_porte' => 2, 
                'id_raca' => 9],
            [
                'nome' => 'Rex Jr.', 
                'idade' => 0.5, 
                'peso' => 0.3, 
                'sobre' => 'Hamster ativo e curioso', 
                'endereco' => '1111 Rua dos Hamsters', 
                'id_sexo' => 2, 
                'id_status' => 1, 
                'id_porte' => 3, 
                'id_raca' => 11],
            [
                'nome' => 'Mia', 
                'idade' => 2, 
                'peso' => 10, 
                'sobre' => 'Gata siamesa tranquila', 
                'endereco' => '1212 Rua dos Gatos', 
                'id_sexo' => 1, 
                'id_status' => 1, 
                'id_porte' => 2, 
                'id_raca' => 5],
            [
                'nome' => 'Tom', 
                'idade' => 5, 
                'peso' => 15, 
                'sobre' => 'Labrador de grande porte', 
                'endereco' => '1313 Avenida dos Cães', 
                'id_sexo' => 2, 
                'id_status' => 1, 
                'id_porte' => 3, 
                'id_raca' => 1],
            [
                'nome' => 'Lola', 
                'idade' => 1, 
                'peso' => 2, 
                'sobre' => 'Coelhinha fofa de pelagem cinza', 
                'endereco' => '1414 Rua dos Coelhos', 
                'id_sexo' => 1, 
                'id_status' => 1, 
                'id_porte' => 1, 
                'id_raca' => 10],
            [
                'nome' => 'Polly', 
                'idade' => 3, 
                'peso' => 0.4, 
                'sobre' => 'Calopsita falante e amigável', 
                'endereco' => '1515 Rua das Aves', 
                'id_sexo' => 1, 
                'id_status' => 1, 
                'id_porte' => 1, 
                'id_raca' => 8],
            [
                'nome' => 'Buddy', 
                'idade' => 2, 
                'peso' => 6, 
                'sobre' => 'Cachorro bulldog brincalhão', 
                'endereco' => '1616 Rua dos Bulldogs', 
                'id_sexo' => 2, 
                'id_status' => 1, 
                'id_porte' => 2, 
                'id_raca' => 3
            ],
        ]);

        // Inserir dados na tabela imagens
        Imagem::insert([
            [
                'nome' => 'cachorro_rex.jpg'],
            [
                'nome' => 'gato_branquinha.jpg'],
            [
                'nome' => 'passaro_pikachu.jpg'],
            [
                'nome' => 'coelho_coelhinho.jpg'],
            [
                'nome' => 'hamster_rex_jr.jpg'],
            [
                'nome' => 'gato_mia.jpg'],
            [
                'nome' => 'cachorro_tom.jpg'],
            [
                'nome' => 'coelho_lola.jpg'],
            [
                'nome' => 'passaro_polly.jpg'],
            [
                'nome' => 'cachorro_buddy.jpg'],
        ]);

        // Inserir vínculo entre imagens e animais
        Imagem_Animal::insert([
            ['id_img' => 1, 'id_animal' => 1],
            ['id_img' => 2, 'id_animal' => 2],
            ['id_img' => 3, 'id_animal' => 3],
            ['id_img' => 4, 'id_animal' => 4],
            ['id_img' => 5, 'id_animal' => 5],
            ['id_img' => 6, 'id_animal' => 6],
            ['id_img' => 7, 'id_animal' => 7],
            ['id_img' => 8, 'id_animal' => 8],
            ['id_img' => 9, 'id_animal' => 9],
            ['id_img' => 10, 'id_animal' => 10],
        ]);

        Adocao::insert([
            [
                'nome' => 'João Silva',
                'cpf' => '12345678901',
                'telefone' => '13981739957',
                'email' => 'joao@email.com',
                'data_nasc' => '1990-01-15',
                'id_animal' => 1,
            ],
            [
                'nome' => 'Maria Santos',
                'cpf' => '23456789012',
                'telefone' => '13981739957',
                'email' => 'maria@email.com',
                'data_nasc' => '1985-06-22',
                'id_animal' => 2,
            ],
            [
                'nome' => 'Carlos Pereira',
                'cpf' => '34567890123',
                'telefone' => '13981739957',
                'email' => 'carlos@email.com',
                'data_nasc' => '1978-12-10',
                'id_animal' => 3,
            ],
            [
                'nome' => 'Ana Oliveira',
                'cpf' => '45678901234',
                'telefone' => '13981739957',
                'email' => 'ana@email.com',
                'data_nasc' => '1992-03-05',
                'id_animal' => 4,
            ],
            [
                'nome' => 'Pedro Rodrigues',
                'cpf' => '56789012345',
                'telefone' => '13981739957',
                'email' => 'pedro@email.com',
                'data_nasc' => '1980-08-18',
                'id_animal' => 5,
            ],
            [
                'nome' => 'Lúcia Souza',
                'cpf' => '67890123456',
                'telefone' => '13981739957',
                'email' => 'lucia@email.com',
                'data_nasc' => '1987-04-29',
                'id_animal' => 6,
            ],
            [
                'nome' => 'Fernando Costa',
                'cpf' => '78901234567',
                'telefone' => '13981739957',
                'email' => 'fernando@email.com',
                'data_nasc' => '1975-11-12',
                'id_animal' => 7,
            ],
            [
                'nome' => 'Sofia Alves',
                'cpf' => '89012345678',
                'telefone' => '13981739957',
                'email' => 'sofia@email.com',
                'data_nasc' => '1983-07-24',
                'id_animal' => 8,
            ],
            [
                'nome' => 'Miguel Pereira',
                'cpf' => '90123456789',
                'telefone' => '13981739957',
                'email' => 'miguel@email.com',
                'data_nasc' => '1995-02-02',
                'id_animal' => 9,
            ],
            [
                'nome' => 'Isabela Santos',
                'cpf' => '01234567890',
                'telefone' => '13981739957',
                'email' => 'isabela@email.com',
                'data_nasc' => '1998-09-08',
                'id_animal' => 10,
            ],
        ]);
    }
}
