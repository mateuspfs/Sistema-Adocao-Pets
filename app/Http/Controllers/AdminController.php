<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index() 
    {
        return view('admin/login');
    }

    public function cadastrar()
    {
        return view('admin/cadastrar');
    }

    public function editar()
    {
        return view('admin/editar');
    }

    public function painel()
    {
        return view('admin/painel');
    }

    public function recuperar_senha()
    {
        return view('admin/recuperar-senha');
    }
}

