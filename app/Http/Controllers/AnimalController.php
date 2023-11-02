<?php

namespace App\Http\Controllers;

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
        $animals = $this->animal->all();
        return view('admin/painel', ['animals' => $animals]);
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

    // public function getRacasByEspecie($id_especie)
    // {
    //     $racas = Raca::where('id_especie', $id_especie)->get();

    //     return response()->json($racas);
    // }   
}

