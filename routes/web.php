<?php

Route::group(['namespace' => 'Admin'],function()
{
	Route::get('/backend','HomeController@HomePage');
	Route::resource('/backend/post','PostController');

	Route::get('backend/login', 'Auth\LoginController@showLoginForm')->name('admin.login');
    Route::post('backend/login', 'Auth\LoginController@login');
    Route::post('backend/logout', 'Auth\LoginController@logout')->name('logout');
    Route::resource('/backend/profile','ProfileController');

});
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['namespace' => 'Frontend'],function()
{
	Route::get('/post','HomeController@homePage');
	Route::get('/post/{post?}','HomeController@singleViewPost')->name('post');

	Route::get('/allcategory/{category?}','HomeController@allCategoryView')->name('category');

});

