<?php

Route::get('/', function(){
    return view('/auth/login');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

route::resource('admin', 'AdminController');
route::resource('solicitacao', 'SolicitacaoController');
route::resource('sugestao', 'SugestaoController');
route::resource('videos', 'VideoController');
route::resource('aprovar', 'AprovarGestordepartamentoController');
route::resource('qrcode', 'QrCodeController');

Route::get('profile', function(){
    return view('profile');
});

/* View Composer*/
View::composer(['*'], function($view){
    
    $user = Auth::user();
    $view->with('user',$user); 

});

