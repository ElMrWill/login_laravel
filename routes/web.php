<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProdutoController;

Route::get('/',[UserController::class, 'index']);
Route::get('admin', [UserController::class, 'index']);
Route::get('admin/login', [UserController::class, 'index'])->name('login');
Route::post('admin-login', [UserController::class, 'postLogin'])->name('login.post');
Route::get('admin/registro', [UserController::class, 'registro'])->name('registro');
Route::post('admin-registro', [UserController::class, 'registraUser'])->name('registra.user');
Route::get('admin/dashboard', [UserController::class, 'dashboard'])->name('dashboard');
Route::post('logout', [UserController::class, 'logout'])->name('logout');


Route::get('admin/crud/insere_novo', [ProdutoController::class, 'create'])->name('adicionar-produto');
Route::get('admin/curd/exibe-produtos', [Produtos::class, 'exibe'])->name('exibir-produtos');
Route::post('admin-crud-insere', [ProdutoController::class, 'store'])->name('insere.post');
