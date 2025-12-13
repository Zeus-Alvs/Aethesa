<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AppController;
use App\Http\Controllers\AethesaController;

Route::get('/', [AppController::class, 'index'])->name('home');
Route::get('/favoritar/{id}', [AethesaController::class, 'adicionarFavorito'])->middleware('auth');
Route::get('/carrinho/{id}', [AethesaController::class, 'adicionarCarrinho'])->middleware('auth');
Route::get('/limparFavorito/', [AethesaController::class, 'limparFavorito'])->middleware('auth');
Route::get('/limparCarrinho/', [AethesaController::class, 'limparCarrinho'])->middleware('auth');
Route::get('/removerCarrinho/{id}', [AethesaController::class, 'removerCarrinho'])->middleware('auth');
Route::get('/removerFavorito/{id}', [AethesaController::class, 'removerFavorito'])->middleware('auth');

Route::get('/register', [AethesaController::class, 'ShowRegistrationForm'])->name('register');
Route::get('/login', [AethesaController::class, 'ShowLoginForm'])->name('login');


Route::post('/register', [AethesaController::class, 'register'])->name('register');
Route::post('/login',[AethesaController::class, 'login'])->name('login');

Route::post('/logout', [AethesaController::class, 'logout'])->middleware('auth')->name('logout');

