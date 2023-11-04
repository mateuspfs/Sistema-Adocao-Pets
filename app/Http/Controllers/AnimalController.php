<?php

namespace App\Http\Controllers;

use App\Models\Adocao;
use App\Models\Animal;
use App\Models\Especie;
use App\Models\Porte;
use App\Models\Raca;
use App\Models\Sexo;
use App\Models\Status;
use Illuminate\Http\Request;

class AnimalController extends Controller
{
    public readonly Animal $animal;
    
    public function __construct()
    {
        $this->animal = new Animal();
    }
    
    public function index()
    {
        $statuss = Status::all();

        $selectedFilters = [
            'searchName' => '',
            'status' => '',
            'date_initial' => '',
            'date_end' => '',
        ];


        $query = Animal::join('status', 'animais.id_status', '=', 'status.id_status')
        ->select('animais.*', 'status.nome as status'); 

        $animals = $query->paginate(10);

        return view('admin/painel', compact('animals', 'statuss', 'selectedFilters'));
    }

    public function create()
    {
        $portes = Porte::all();
        $racas = Raca::all();
        $especies = Especie::all();
        $sexos = Sexo::all();
        
        return view('admin/cadastrar', compact('portes', 'especies', 'racas', 'sexos'));
    }

    public function store(Request $request)
    {
        // Recuperar dados do formulario, exceto os que estão em except
        $data = $request->except('_token');
        
        // // Juntar o valor inteiro e sua unidade para salvar no banco
        $data['idade'] = $data['idade'] . ' ' . $data['unidade_tempo']; 
        $data['peso'] = $data['peso'] . ' ' . $data['unidade_medida'];

        // Fazer o create
        $create = $this->animal->create([
            'nome' => $data['nome'],
            'idade' => $data['idade'],
            'peso' => $data['peso'],
            'sobre' => strip_tags($data['sobre']),
            'endereco' => $data['endereco'],
            'id_sexo' => $data['id_sexo'],
            'id_porte' => $data['id_porte'],
            'id_especie' => $data['id_especie'],
            'id_raca' => $data['id_raca'],
            'id_status' => 1,
        ]);

        if ($create) {
            return redirect()->back()->with('Sucesso', 'Atualização bem-sucedida');
        }

        return redirect()->back()->with('Error', 'Falha na atualização');   
    }

    public function show(animal $animal)
    {
        return view('site/integra', ['animal' => $animal->id_animal ]);
    }

    public function edit(animal $animal)
    {
        $portes = Porte::all();
        $especies = Especie::all();
        $sexos = Sexo::all();
        $racas = Raca::all();
        $statuss = Status::all();

        return view('admin/editar', ['animal' => $animal], compact('portes', 'especies', 'racas', 'sexos', 'statuss'));
    }

    public function update(Request $request, $id_animal)
    {
        // Recuperar dados do formulario, exceto os que estão em except
        $data = $request->except(['_token', '_method', 'id_especie']);

        // Aplicar strip_tags() ao campo "sobre"
        $data['sobre'] = strip_tags($data['sobre']);

        // Juntar o valor inteiro e sua unidade para salvar no banco
        $data['idade'] = $data['idade'] . " " . $data['unidade_tempo'];
        $data['peso'] = $data['peso'] . " " . $data['unidade_medida'];

        // Remover do array antes do update
        unset($data['unidade_tempo']);
        unset($data['unidade_medida']);

        // var_dump($data);
        // Realizar o update
        $update = $this->animal->where('id_animal', $id_animal)->update($data);

        // Se atualizar com sucesso retorna a página com uma alert 
        if ($update) {
            return redirect()->back()->with('Sucesso', 'Atualização bem-sucedida');
        }
        return redirect()->back()->with('Error', 'Falha na atualização');
    }

    public function destroy(string $id_animal)
    {
        $this->animal->where('id_animal', $id_animal)->delete();

        return redirect()->route('animals.index');
    }

    public function filtersAnimal(Request $request) 
    {
        $statuss = Status::all();

        $searchName = $request->searchName;
        $status = $request->status;
        $date_initial = $request->date_initial;
        $date_end = $request->date_end;

        $selectedFilters = [
            'searchName' => $searchName,
            'status' => $status,
            'date_initial' => $date_initial,
            'date_end' => $date_end,
        ];

        // Iniciar a consulta 
        $query = Animal::join('status', 'animais.id_status', '=', 'status.id_status')
                    ->select('animais.*', 'status.nome as status');

        // Aplicar filtros se eles foram fornecidos
        if($searchName) {
            $query->where('animais.nome', 'like', '%' . $searchName . '%');
        }
        if ($status) {
            $query->where('animais.id_status', $status);
        }
        if ($date_initial && $date_end) {
            $query->whereBetween('data_adocao', [$date_initial, $date_end]);
        }
        if ($date_initial && !$date_end) {
            $query->where('created_at', '>=' . $date_initial);
        }
        if ($date_end) {
            $query->where('created_at', '<=' .$date_end);
        }
    
        // Ordenar os resultados
        $query->orderBy('id_animal', 'desc');
    
        // Paginar os resultados
        $animals = $query->paginate(10);

        // Retornar a p[agina com os dados
        return view('admin/painel', compact('animals', 'statuss', 'selectedFilters'));
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