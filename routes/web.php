<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\AuthorController;

/*
Aquí se definen las rutas principales del sistema.
*/

Route::get('/', function () {
    return view('welcome');
});

// Rutas completas del módulo de Libros
Route::resource('books', BookController::class);

// Rutas completas del módulo de Autores  
Route::resource('authors', AuthorController::class);
Route::resource('books', BookController::class, );

Route::resource('authors', AuthorController::class);