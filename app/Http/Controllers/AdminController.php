<?php

namespace App\Http\Controllers;

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

    public function listagem_adocao()
    {
        return view('admin/listagem_adocao');
    }


}

