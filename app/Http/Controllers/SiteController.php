<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SiteController extends Controller
{
    public function index() 
    {
        return view('site/index');
    }

    public function integra()
    {
        return view('site/integra');
    }

    public function quero_adotar()
    {
        return view('site/quero-adotar');
    }

    public function formulario()
    {
        return view('site/formulario');
    }
}
