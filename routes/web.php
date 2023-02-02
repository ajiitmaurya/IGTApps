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

Route::get('/create-emp', 'App\Http\Controllers\EmployeeController@create');
Route::post('/new-emp', 'App\Http\Controllers\EmployeeController@createNewEmployee');
Route::get('/xmltojson', 'App\Http\Controllers\Controller@xmlToJson');
Route::get('/xml', 'App\Http\Controllers\Controller@xmlPage');
Route::post('/json-store', 'App\Http\Controllers\Controller@jsonStore');
Route::get('/json-delete', 'App\Http\Controllers\Controller@jsonDelete');
Route::any('/image', 'App\Http\Controllers\Controller@imageIndex');
Route::get('/get-image/images/{img}', 'App\Http\Controllers\Controller@getImage');