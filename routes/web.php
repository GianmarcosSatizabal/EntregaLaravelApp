<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!routes/web.php
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get("curso", function () {
    return view("curso");
});

Route::get("clase/controller/edit", "App\Http\Controllers\CursoController@edit");
Route::get("clase/controller/show", 'App\Http\Controllers\CursoController@show');
Route::get("clase/controller/index", "App\Http\Controllers\CursoController@index")->name("inicio");
Route::get("clase/controller/show", "App\Http\Controllers\CursoController@show")->name("show");
Route::get("clase/controller/edit", "App\Http\Controllers\CursoController@edit")->name("edit");
Route::post("clase/controller", "App\Http\Controllers\CursoController@store")->name("guardar");
Route::put("clase/controller/{id}", "App\Http\Controllers\CursoController@update")->name("actualizar");
Route::delete("clase/controller/{id}", "App\Http\Controllers\CursoController@delete")->name("eliminar");

//Practicamente se reemplazo de la lina 24 hasta el 31, con esta sola linea 34.
Route::resource("ejemplo", "App\Http\Controllers\EjemploController")->middleware("auth");




Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
