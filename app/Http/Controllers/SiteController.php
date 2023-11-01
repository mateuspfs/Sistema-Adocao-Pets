<?php

namespace App\Http\Controllers;

use App\Models\Animal;
use App\Models\Especie;
use App\Models\Porte;
use App\Models\Raca;
use App\Models\Sexo;
use Illuminate\Http\Request;

use function Laravel\Prompts\select;

class SiteController extends Controller
{
    public readonly Animal $animal;
    
    public function __construct()
    {
        $this->animal = new Animal();
    }
    
    public function home()
    {
        return view('site/index');
    }


    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $animals = Animal::where('id_status', 1)
                        ->orderBy('created_at', 'desc') // ordenar por ordem de cadastro, descrecente 
                        ->orderBy('id_animal', 'desc') // para desempate, ordenar por ordem da id, sendo o último cadastrado em primeiro
                        ->get();

        return view('site/quero-adotar', ['animals' => $animals]);
    }

    /**
     * Display the specified resource.
     */
    public function show($id_animal)
    {
        $dadosAnimal = $this->dadosCompletosAnimal($id_animal);
        $animal = $dadosAnimal->first();

        return view('site/integra', ['animal' => $animal ]);
    }

    public function formulario($id_animal)
    {
        $dadosAnimal = $this->dadosCompletosAnimal($id_animal);
        $animal = $dadosAnimal->first();

        return view('site.formulario', ['animal' => $animal ]);
    }
    public function submitAdocao($id_animal)
    {
       
    }

    private function dadosCompletosAnimal($id_animal) {

        $dadosAnimal = Animal::select(
            'animais.id_animal as id_animal',
            'animais.nome as nome',
            'animais.idade as idade',
            'animais.peso as peso',
            'animais.sobre as sobre',
            'animais.endereco as endereco',
            'sexo.nome as sexo',
            'status.nome as status',
            'portes.nome as porte',
            'racas.nome as raca',
            'especies.nome as especie',
            'imagens.nome as imagem'
        )
        ->join('status', 'animais.id_status', '=', 'status.id_status')
        ->join('portes', 'animais.id_porte', '=', 'portes.id_porte')
        ->join('sexo', 'animais.id_sexo', '=', 'sexo.id_sexo')
        ->join('racas', 'animais.id_raca', '=', 'racas.id_raca')
        ->join('especies', 'racas.id_especie', '=', 'especies.id_especie')
        ->leftJoin('imagens_animal', 'animais.id_animal', '=', 'imagens_animal.id_animal')
        ->leftJoin('imagens', 'imagens.id_img', '=', 'imagens_animal.id_img')
        ->where('animais.id_animal', $id_animal)
        ->get();
        
        // echo '<pre>';
        // var_dump($dadosAnimal);
        // echo '<pre>';
        
        if ($dadosAnimal->isNotEmpty()) {
            return $dadosAnimal;
        }
    }
}
