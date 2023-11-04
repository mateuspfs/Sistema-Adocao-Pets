<?php

namespace App\Http\Controllers;

use App\Mail\SendMail;
use App\Models\Animal;
use App\Models\Especie;
use App\Models\Porte;
use App\Models\Raca;
use App\Models\Sexo;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;

class SiteController extends Controller
{
    public readonly Animal $animal;
    
    public $data;

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
        $portes = Porte::all();
        $racas = Raca::all();
        $especies = Especie::all();
        $sexos = Sexo::all();

        $selectedFilters = [
            'especie' => '',
            'raca' => '',
            'endereco' => '',
            'porte' => '',
            'sexo' => '',
        ];

        $animals = Animal::where('animais.id_status', 1) 
                        ->orderBy('animais.id_animal', 'desc') // para desempate, ordenar por ordem da id, sendo o último cadastrado em primeiro
                        ->paginate(9);

        return view('site/quero-adotar', compact('portes', 'racas', 'sexos', 'especies', 'animals', 'selectedFilters'));
    }

    /**
     * Display the specified resource.
     */
    public function show($id_animal)
    {
        $dadosAnimal = $this->dadosCompletosAnimal($id_animal);
        $animal = $dadosAnimal->first();

        if($animal->status === "Inativo"){
            return redirect()->route('site.index');
        }
        return view('site/integra', ['animal' => $animal ]);
    }

    public function filterAnimals(Request $request)
    {
        $portes = Porte::all();
        $racas = Raca::all();
        $especies = Especie::all();
        $sexos = Sexo::all();
        
        // Parâmetros de filtro
        $especie = $request->especie;
        $raca = $request->raca;
        $endereco = $request->endereco;
        $porte = $request->porte;
        $sexo = $request->sexo;

        $selectedFilters = [
            'especie' => $especie,
            'raca' => $raca,
            'endereco' => $endereco,
            'porte' => $porte,
            'sexo' => $sexo,
        ];
    
        // Iniciar a consulta com base no status
        $query = Animal::where('id_status', 1);
    
        // Aplicar filtros se eles foram fornecidos
        if ($especie) {
            $query->join('racas', 'animais.id_raca', '=', 'racas.id_raca')
            ->select('animais.*') 
            ->where('racas.id_especie', $especie);
        }
        if ($raca) {
            $query->where('animais.id_raca', $raca);
        }
        if ($endereco) {
            $query->where('endereco', 'like', '%' . $endereco . '%');
        }
        if ($porte) {
            $query->where('id_porte', $porte);
        }
        if ($sexo) {
            $query->where('id_sexo', $sexo);
        }
    
        // Ordenar os resultados
        $query->orderBy('id_animal', 'desc');
    
        // Paginar os resultados
        $animals = $query->paginate(9);

        return view('site.quero-adotar', compact('portes', 'racas', 'sexos', 'especies', 'animals', 'selectedFilters'));
    }
    
    public function formulario($id_animal)
    {
        $dadosAnimal = $this->dadosCompletosAnimal($id_animal);
        $animal = $dadosAnimal->first();

        return view('site.formulario', ['animal' => $animal ]);
    }

    public function submitAdocao(Request $request)
    {
        $request->validate([
                'nome' => 'required',
                'email' =>'required|email',
                'telefone' => 'required',
                'animal' =>'required',
                'cpf' => 'required',
                'dt_nasc' => 'required',
            ]);

            $data = array(
                'nome' => $request->solicitante,
                'email' => $request->email,
                'telefone' => $request->cel,
                'animal' => $request->animal,
                'cpf' => $request->cpf,
                'dt_nasc' => $request->nascimento,
            );

            Mail::to( config('mail.from.address') )
                ->send( new SendMail($data));

            // return back()->with('sucess', 'Obrigado por adotar na nossa plataforma!');
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
        
        if ($dadosAnimal->isNotEmpty()) {
            return $dadosAnimal;
        }
    }
}
