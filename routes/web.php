<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Rota inicial para usuários logados
Route::get('/candidates', function () {
    return view('candidates.index'); // Implementação temporária. (O controler será implementado posteriormente)
})->middleware(['auth'])->name('candidates.index');

// Rota para o perfil do usuário autenticado
Route::get('/profile', function () {
    return view('profile.show');
})->middleware(['auth'])->name('profile.show');

