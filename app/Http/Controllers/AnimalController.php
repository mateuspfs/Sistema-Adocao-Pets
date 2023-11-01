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
    
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $animals = $this->animal->all();
        return view('admin/painel', ['animals' => $animals]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $portes = Porte::all();
        $racas = Raca::all();
        $especies = Especie::all();
        $sexos = Sexo::all();
        
        return view('admin/cadastrar', compact('portes', 'especies', 'racas', 'sexos'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->except('_token');
        
        $idade = $data['idade'] . ' ' . $data['unidade_tempo']; 
        $peso = $data['peso'] . ' ' . $data['unidade_medida'];

        $create = $this->animal->create([
            'nome' => $data['nome'],
            'idade' => $idade,
            'peso' => $peso,
            'sobre' => $data['sobre'],
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

    /**
     * Display the specified resource.
     */
    public function show(animal $animal)
    {
        return view('site/integra', ['animal' => $animal->id_animal ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(animal $animal)
    {
        $portes = Porte::all();
        $especies = Especie::all();
        $sexos = Sexo::all();
        $racas = Raca::all();

        return view('admin/editar', ['animal' => $animal], compact('portes', 'especies', 'racas', 'sexos'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id_animal)
    {
        $update = $this->animal->where('id_animal', $id_animal)->update($request->except(['_token', '_method', 'id_especie']));

        if ($update) {
            return redirect()->back()->with('Sucesso', 'Atualização bem-sucedida');
        }

        return redirect()->back()->with('Error', 'Falha na atualização');
    }

    /**
     * Remove the specified resource from storage.
     */
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

