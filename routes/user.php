<?php

Route::get('/home', 'UserController@index')->name('home');


Route::group(['prefix' => 'profile', 'as' =>'profile.'], function () {

    Route::get('/', 'ProfileController@index')->name('index');
    Route::get('/create', 'ProfileController@create')->name('create');
    Route::post('/store', 'ProfileController@store')->name('store');
    Route::get('/{profile}/edit', 'ProfileController@edit')->name('edit');
    Route::post('/update', 'ProfileController@update')->name('update');

});

Route::group(['prefix' => 'phone', 'as' =>'phone.'], function () {

    Route::get('/', 'PhoneController@index')->name('index');
    Route::get('/create', 'PhoneController@create')->name('create');
    Route::post('/store', 'PhoneController@store')->name('store');
    Route::get('/{profile}/edit', 'PhoneController@edit')->name('edit');
    Route::post('/update', 'PhoneController@update')->name('update');

});

Route::group(['prefix' => 'vehicle', 'as' =>'vehicle.'], function () {

    Route::get('/', 'VehicleController@index')->name('index');
    Route::get('/create', 'VehicleController@create')->name('create');
    Route::post('/store', 'VehicleController@store')->name('store');
    Route::get('/{profile}/edit', 'VehicleController@edit')->name('edit');
    Route::post('/update', 'VehicleController@update')->name('update');

});

Route::group(['prefix' => 'location', 'as' =>'location.'], function () {

    Route::get('/', 'LocationController@index')->name('index');
    Route::get('/create', 'LocationController@create')->name('create');
    Route::post('/store', 'LocationController@store')->name('store');
    Route::get('/delete', 'LocationController@delete')->name('delete');

});