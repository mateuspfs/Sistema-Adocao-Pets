<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\SiteController;
use App\Http\Controllers\UserController;
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

Route::get('admin/cadastrar', [AdminController::class, 'cadastrar'])->name('admin.cadastrar');

Route::get('admin/editar', [AdminController::class, 'editar'])->name('admin.editar');

Route::get('admin/painel', [AdminController::class, 'painel'])->name('admin.painel');

Route::get('admin/recuperar-senha', [AdminController::class, 'recuperar_senha'])->name('admin.recuperar-senha');

// Crud Usuario

Route::get('users', [UserController::class, 'index'])->name('users.index'); 

Route::get('users/create', [AdminController::class, 'create'])->name('users.create');

Route::post('users', [UserController::class, 'store'])->name('users.store'); 

Route::get('/users/{user}', [UserController::class, 'show'])->name('admin.show');

Route::get('/users/{user}/edit', [UserController::class, 'edit'])->name('users.edit');

Route::post('users', [UserController::class, 'store'])->name('users.store'); 

Route::put('/users/{user}', [UserController::class, 'update'])->name('users.update');

Route::delete('/users/{user}', [UserController::class, 'destroy'])->name('users.destroy');

