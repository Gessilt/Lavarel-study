<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

// Blade deixa as rotas dinâmicas, é a template engine do laravel: Pode-se digitar com HTML puro e pegar os dados fornecidos pelo controller
// Views são renderizadas pelo blade.


// Nomear as rotas sempre com "".blade.php
// O nome que importa (vai chamar a página) é o anterior a function, no view(), pode inserir qualquer nome, pois este será o da URL.
// Posso ter uma URL diferente, mas chamar uma view anterior, como a welcome, acima.

Route::get('/new', function () {

    $name = "Matheus";

    $names = ["Júlio","Levi","Ronaldo","Battisti"];

    $age = 23;

    $numbers = [1,2,3,4,5];

    return view('new',['name' => $name, 'age' => $age, "numbers" => $numbers, "names" => $names]);
});
