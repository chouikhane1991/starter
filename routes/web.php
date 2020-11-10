<?php

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


//simple routing
Route::get('/test1', function () {
    return ('welcome');
})->name('c');
//routing required parameters
Route::get('/test2/{id}', function ($id) {
    return ('welcome'.$id);
})->name('b');
//routing without and with parameters
Route::get('/test3/{id?}', function ($id) {
    return ('test3'.$id);
})->name('a');


Route::get('front','front\FirstController@ShowNames');

Auth::routes(['verify'=>true]);

Route::get('/home', 'HomeController@index')->name('home')->middleware('verified');

Route::get('/redirect/{services}','SocialController@redirect');

Route::get('/callback/{services}','SocialController@callback');



