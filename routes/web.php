<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\EditorialController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
| Aquí se definen las rutas principales del sistema.
|
*/

Route::get('/', function () {
    return view('welcome');
})->name('home');

// Rutas completas del módulo de Libros
Route::resource('books', BookController::class);

// Rutas completas del módulo de Autores  
Route::resource('authors', AuthorController::class);

// Rutas completas del módulo de Libros
Route::resource('editorials', EditorialController::class);

// Rutas completas del módulo de Categorias
Route::resource('categories', CategoryController::class);