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
    return view('home');
});

Route::get('/varianti/{nome}', function ($nome) {
    \OnPage\op_lang('en');
    // $var = \Data\Varianti::whereField('nome_lastra', $nome)
    $var = \Data\Famiglie::whereHas('varianti', function($q) {
        $q->whereField('descrizione_seo.it', 'like', '%quarzo%');
    })
        ->first();
    return $var->getValues();
    // return view('variante');
});
