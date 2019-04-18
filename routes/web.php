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

Route::get('/', function(){
    return view('/auth/login');
});

// Route::get('/register', function () {
//     return view('/auth/register');
// });

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/audiovisual', 'AudiovisualController@index')->middleware('auth')->name('audiovisual');

Route::get('/qrcode', 'QrCodeController@index')->middleware('auth')->name('qrcode');

// Route::get('/qrcode', 'QrCodeFunController@index')->middleware('auth')->name('qrcode');

Route::get('/solicitacao', 'SolicitacaoController@index')->middleware('auth')->name('solicitacao');

Route::get('/interprete', 'InterpreteController@index')->middleware('auth')->name('interprete');

Route::get('/usuario', 'UsuarioController@index')->middleware('auth')->name('usuario');
Route::post('/usuario/cadastrar', 'UsuarioController@cadastrar')->middleware('auth')->name('cadastrarUsuario');


Route::resource('category','CategoryController');

Route::get('profile', function(){
    return view('profile');
});

/* View Composer*/
View::composer(['*'], function($view){
    
    $user = Auth::user();
    $view->with('user',$user); 

});

