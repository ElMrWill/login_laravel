<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProdutoController;
use App\Http\Controllers\Frontend\FrontendController;
use App\Http\Controllers\Frontend\ClienteController;

Route::get('/', [FrontendController::class, 'index'])->name('inicio-loja');
Route::get('add-carrinho/{id}', [FrontendController::class, 'verifica'])->name('add-carrinho');
Route::post('login-user', [ClienteController::class, 'login'])->name('login-user');
Route::get('user/registrar-novo', [ClienteController::class, 'registrar'])->name('registrar.cliente');
Route::post('registra-user', [ClienteController::class, 'criar'])->name('cria.cliente');

Route::get('admin/', [UserController::class, 'index']);
Route::get('admin', [UserController::class, 'index']);
Route::get('admin/login', [UserController::class, 'index'])->name('login');
Route::post('admin-login', [UserController::class, 'postLogin'])->name('login.post');
Route::get('admin/registro', [UserController::class, 'registro'])->name('registro');
Route::post('admin-registro', [UserController::class, 'registraUser'])->name('registra.user');
Route::get('admin/dashboard', [UserController::class, 'dashboard'])->name('dashboard');
Route::post('logout', [UserController::class, 'logout'])->name('logout');



Route::get('admin/crud/insere_novo', [ProdutoController::class, 'create'])->name('adicionar-produto');
Route::get('admin/curd/exibe-produtos', [ProdutoController::class, 'exibe'])->name('exibir-produtos');
Route::post('admin-crud-insere', [ProdutoController::class, 'store'])->name('insere.post');
Route::get('admin/crud/edit/{id}', [ProdutoController::class, 'edit'])->name('editar.produtos');
Route::post('admin-crud-{id}', [ProdutoController::class, 'update'])->name('insere.altera');
Route::post('admin/crud/delete/{id}', [ProdutoController::class, 'destroy'])->name('crud.destroy');
