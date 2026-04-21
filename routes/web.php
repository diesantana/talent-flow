<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Rota inicial para usuários logados
Route::get('/candidates', function () {
    return view('candidates.index'); // Implementação temporária. (O controler será implementado posteriormente)
})->middleware(['auth'])->name('candidates.index');
