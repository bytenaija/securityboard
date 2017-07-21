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
Route::get('/crimes/add', function () {
    return view('addcrime');
});

Route::get('/', [ 'as' => 'home', function () {
    return view('index');
}]);

Route::get('/login', [ 'as' => 'login',  function () {
    return view('login');
}]);

Route::get('/registration', function () {
    return view('registration');
});

Route::post('/registration', ['as' => 'registrationpost', 'uses'=>'Auth\RegisterController@create']);
Route::post('/login', ['as' => 'loginpost', 'uses'=>'Auth\LoginController@postLogin']);
Route::get('/logout', ['as' => 'logout', 'uses'=>'Auth\LoginController@logout']);



Route::get('/crimes/{id}','CrimesController@getCrime');
Route::middleware('auth')->get('/crimes/edit/{id}','CrimesController@editCrime');



