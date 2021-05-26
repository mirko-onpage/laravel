<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::get('/resources', function() {
    $resources = OnPage\Models\Resource::get();
    return $resources;
});

Route::get('/resource/{name}', function($name) {
    $name = ucfirst($name);
    $model = "OnPage\\Op\\" . $name;
    $things = $model::get();
    $res=[];
    foreach($things as $thing){   
        $res[]=$thing->getValues();
        //echo $thing->val('codice') . ";" . $thing->val('descrizione1') . ";" . $thing->val('descrizione2') . ";" . $thing->val('descrizione3') . "\n";
    }
    return $res;
});

Route::get('/thing/{id}', function($name) {
    $model = "OnPage\\Op\\" . $name;
    $resources = $model::get();
    return $resources;
});



Route::get('/articoli', function() {
    $arts = OnPage\Op\Articoli::loaded()->limit(1000)->get();
    foreach($arts as $art){
        echo $art->val('codice') . ";" . $art->val('descrizione1') . ";" . $art->val('descrizione2') . ";" . $art->val('descrizione3') . "\n";
    }
});

Route::get('/immagineprodotto', function() {
    $p = OnPage\Op\Prodotti::first();
    $url=$p->getImage('disegno2');
    echo "Downloading from:" . $url;
    return redirect($url);
});
Route::get('/prova', function() {
    return request()->all();
});

Route::get('/risorse', function() {
    return \DB::table('resources')->pluck('name');
});

Route::get('/primocapitolo', function() {
    $cap = OnPage\Op\Capitoli::first();
    return $cap->getValues();
});

Route::get('/primocodice', function() {
    $art = OnPage\Op\Articoli::first();
    $cod = $art->val('codice');
    return "Codice primo articolo: $cod";
});

Route::get('/argomenti', function() {
    $cap = OnPage\Op\Capitoli::first();
    return $cap->getValues();
});
