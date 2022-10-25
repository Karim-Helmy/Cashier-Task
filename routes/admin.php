<?php

    // Must Login
    // Auth::routes();

Route::group(['namespace'=>'admin'], function () {
    Route::get('/login', 'AdminController@login')->name('adminLogin');
    Route::post('login/store', 'AdminController@store')->name('storeLogin');
    Route::group(['middleware' => 'admin:Admin'], function(){
        Route::get('/', 'AdminController@index')->name('dashboard');
        Route::get('/logout', 'AdminController@logout')->name('logout');
        Route::get('/users', 'AdminController@users')->name('users');
        Route::get('/subscribers', 'AdminController@subscribers')->name('subscribers');
        Route::get('/users/edit/{id}', 'AdminController@user_edit')->name('users.edit');
        Route::post('/users/update/{id}', 'AdminController@user_update')->name('users.update');
        Route::get('/users/delete/{id}', 'AdminController@user_delete')->name('users.delete');
        Route::get('/users/activate/{id}', 'AdminController@user_activate')->name('users.activate');
        Route::get('/users/deactivate/{id}', 'AdminController@user_deactivate')->name('users.deactivate');
    });
});
