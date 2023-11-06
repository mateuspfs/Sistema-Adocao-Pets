<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\SiteController;
use App\Http\Controllers\LoginController;
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

Route::get('/', [SiteController::class, 'home'])->name('site.home'); 

Route::get('/quero-adotar', [SiteController::class, 'index'])->name('site.index');

Route::get('/formulario/{id_animal}', [SiteController::class, 'formulario'])->name('site.formulario');

Route::post('/formulario/submit', [SiteController::class, 'submitAdocao'])->name('submit.adocao');

Route::get('/integra/{id_animal}', [SiteController::class, 'show'])->name('site.integra');

Route::get('/filtersAnimal', [AnimalController::class, 'filtersAnimalSite'])->name('filtersAnimal');

// Admin

Route::get('/login', function () {
    return view('admin/login');
})->name('admin.login'); 

Route::get('/recuperar-senha', [AdminController::class, 'recuperar_senha'])->name('admin.recuperar-senha');

Route::get('/Auth', [LoginController::class, 'auth'])->name('login.auth');

Route::get('/logout', [LoginController::class, 'logout'])->name('login.logout');

// Crud Animals

Route::resource('/animals', AnimalController::class)->middleware('auth');

Route::get('/adoções', [AdminController::class, 'showAdocao'])->name('admin.adocao')->middleware('auth');

Route::get('/filtersAdoçao', [AdminController::class, 'filtersAdocao'])->name('admin.filtersAdocao')->middleware('auth');

Route::get('/filtersAnimal', [AnimalController::class, 'filtersAnimalAdmin'])->name('admin.filtersAnimal')->middleware('auth');

