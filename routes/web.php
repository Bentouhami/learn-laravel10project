<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/blog', function(Request $resquest){

    return [
        "name" => $resquest->input('name', 'john Doe'),
        "content" => "This is a blog post about Laravel."
    ];
});

Route::get('/blog/{slug}-{id}', function(string $slug, string $id, Request $request){
    return [
        'slug' => $slug,
        'id' => $id,

        'name' => $request->input('name')
    ];
})->where([
    'id' => '[0-9]+', // Only numbers
    'slug' => '[a-z0-9\-]+'  // Any letters and number (lowercase or uppercase)
]);
