<?php

Auth::routes();

Route::get('/', function(){
    return view('welcome');
});

Route::get('/home', 'HomeController@index')->middleware('auth')->name('home');

Route::get('/contents/home', function() {
    return view("contents/home");
});