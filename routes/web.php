<?php

use Illuminate\Support\Facades\Route;

if(env('APP_DEBUG')){
    Log::notice("Acesso ao Sistema ".url()->current());
}
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
    return redirect(route('login'));
});

Route::get('/search', 'AgilityController@search');

Auth::routes();

Route::get('/home', function(){
    return redirect(route('agilities.index'));
})->name('home');



Auth::routes(['verify' => true]);



Route::resource('agilities', 'AgilityController');
