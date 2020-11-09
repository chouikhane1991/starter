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
// to add this route file we have to add it in routserverprovider first app/providers
Route::get('/admin', function () {
    return ('admin panel');
});



