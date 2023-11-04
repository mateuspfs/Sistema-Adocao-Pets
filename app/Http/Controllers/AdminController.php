<?php

namespace App\Http\Controllers;

use App\Models\Adocao;
use App\Models\Animal;
use App\Models\Status;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index() 
    {
        return view('admin/login');
    }

    public function recuperar_senha()
    {
        return view('admin/recuperar-senha');
    }

    public function showAdocao()
    {    
        $selectedFilters = [
            'searchName' => '',
            'date_initial' => '',
            'date_end' => '',
        ];

        $query = Adocao::join('animais', 'animais.id_animal', '=', 'adocao.id_animal')
        ->select('adocao.*', 'animais.nome as nome_animal');
        
        $adocoes = $query->paginate(10);

        return view('admin/listagem_adocao',  compact('selectedFilters', 'adocoes'));
    }

    public function filtersAdocao(Request $request) 
    {
        $searchName = $request->searchName;
        $status = $request->status;
        $date_initial = $request->date_initial;
        $date_end = $request->date_end;

        $selectedFilters = [
            'searchName' => $searchName,
            'date_initial' => $date_initial,
            'date_end' => $date_end,
        ];

        // Iniciar query
        $query = Adocao::query();

        // Aplicar filtros se eles foram fornecidos
        if ($searchName) {
            $query->join('animais', 'animais.id_animal', '=', 'adocao.id_animal')
            ->select('adocao.*', 'animais.nome as nome_animal') 
            ->where('animais.nome', 'like', '%' . $searchName . '%');
        }
        if ($date_initial && $date_end) {
            $query->whereBetween('data_adocao', [date($date_initial), date($date_end)]);
        }
        if ($date_initial && !$date_end) {
            $query->where('created_at', '>=' . date($date_initial));
        }
        if ($date_end && !$date_initial) {
            $query->where('created_at', '<=' . date($date_end));
        }
    
        // Ordenar os resultados
        $query->orderBy('id_solicitante', 'desc');
    
        // Paginar os resultados
        $adocoes = $query->paginate(10);

        return view('admin/listagem_adocao', compact('adocoes', 'selectedFilters'));
    }
}

