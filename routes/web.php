<?php

Auth::routes();

Route::get('/', function(){
    return view('/auth/login');
});

Route::get('/home', 'AdminController@index')->middleware('auth')->name('admin');

Route::get('/qrcode', 'QrCodeController@index')->middleware('auth')->name('qrcode');

Route::get('/funcionario', 'FuncionarioController@index')->middleware('auth')->name('funcionario');

Route::get('/interprete', 'InterpreteController@index')->middleware('auth')->name('interprete');

Route::get('/usuario', 'UsuarioController@index')->middleware('auth')->name('usuario');


// Route::get('/contents/home', function() {
//     return view("contents/home");
// });


