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
    return view('crimes.addcrime');
})->middleware("auth");

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



Route::post('/crimes/save',[
'uses'=>'CrimesController@addCrime',
 'as'=>'crime.add'
]);

Route::get('/crimes/{id}', [
'uses'=>'CrimesController@getCrime',
  'as'=>'crime.get'
 
]);

Route::get('/crimes', [
'uses'=>'CrimesController@index',
  'as'=>'crime.all'
 
]);



Route::middleware('auth')->get('/crimes/edit/{id}','CrimesController@editCrime');



