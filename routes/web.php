<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\SiteController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AnimalController;
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

// Site

Route::get('/', [SiteController::class, 'index'])->name('site.index'); 

Route::get('/quero-adotar', [SiteController::class, 'quero_adotar'])->name('site.quero-adotar');

Route::get('/formulario', [SiteController::class, 'formulario'])->name('site.formulario');

Route::get('/integra', [SiteController::class, 'integra'])->name('site.integra');

// Admin

Route::get('admin/login', [AdminController::class, 'index'])->name('admin.login'); 

Route::get('admin/recuperar-senha', [AdminController::class, 'recuperar_senha'])->name('admin.recuperar-senha');

Route::get('admin/listagem_adocao', [AdminController::class, 'listagem_adocao'])->name('admin.adocao');

// Crud Animals

Route::resource('animals', AnimalController::class);

// Route::get('/api/get-racas-by-especie/{id_especie}', 'AnimalController@getRacasByEspecie');