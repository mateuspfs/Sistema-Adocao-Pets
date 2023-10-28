<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// paginas site

Route::get('/', function () {
    return view('site/index');
})->name('site.index'); 

Route::get('/quero-adotar', function () {
    return view('site/quero-adotar');
})->name('site.quero-adotar');

Route::get('/formulario', function () {
    return view('site/formulario');
})->name('site.formulario');

Route::get('/integra', function () {
    return view('site/integra');
})->name('site.integra');

// paginas admin

Route::get('/admin', function () {
    return view('admin/login');
})->name('admin.login'); 

Route::get('admin/cadastrar', function () {
    return view('admin/cadastrar');
})->name('admin.cadastrar'); 

Route::get('admin/editar', function () {
    return view('admin/editar');
})->name('admin.editar'); 

Route::get('admin/painel', function () {
    return view('admin/painel');
})->name('admin.painel'); 

Route::get('admin/recuperar-senha', function () {
    return view('admin/recuperar-senha');
})->name('admin.recuperar-senha'); 


