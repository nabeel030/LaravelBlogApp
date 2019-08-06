<?php

use \App\Setting;

Route::get('/','FrontendController@index')->name('index');

Auth::routes();

Route::group(['prefix'=>'admin', 'middleware'=> 'auth'], function()
{
  Route::get('/home', 'HomeController@index')->name('home');
  Route::get('/post/create','PostController@create')->name('post.create');
  Route::post('/post/store','PostController@store')->name('post.store');
  Route::get('/category/create','CategoriesController@create')->name('category.create');
  Route::post('/category/store','CategoriesController@store')->name('category.store');
  Route::get('/category/categories-list','CategoriesController@index')->name('category.home');
  Route::get('/category/delete/{id}','CategoriesController@destroy')->name('category.delete');
  Route::get('/category/edit/{id}','CategoriesController@edit')->name('category.edit');
  Route::post('/category/update/{id}', 'CategoriesController@update')->name('category.update');
  Route::get('/post/posts-list','PostController@index')->name('post.index');
  Route::get('/post/edit/{id}','PostController@edit')->name('post.edit');
  Route::get('/post/delete/{id}','PostController@destroy')->name('post.delete');
  Route::get('/post/trash','PostController@TrashedPosts')->name('post.trash');
  Route::get('/post/destroy/{id}','PostController@kill')->name('post.destroy');
  Route::get('/post/restore/{id}','PostController@restore')->name('post.restore');
  Route::post('/post/update/{id}','PostController@update')->name('post.update');
  Route::get('/tag/create','TagController@create')->name('tag.create');
  Route::post('/tag/store','TagController@store')->name('tag.store');
  Route::get('/tag/tags-list','TagController@index')->name('tag.index');
  Route::get('/tag/edit/{id}','TagController@edit')->name('tag.edit');
  Route::get('/tag/delete/{id}','TagController@destroy')->name('tag.delete');
  Route::post('/tag/update/{id}','TagController@update')->name('tag.update');
  Route::get('/users','UserController@index')->name('users');
  Route::get('/users/create','UserController@create')->name('user.create');
  Route::post('/users/store','UserController@store')->name('user.store');
  Route::get('/user/make-admin/{id}','UserController@make_admin')->name('user.admin');
  Route::get('/user/remove-admin/{id}','UserController@remove_admin')->name('user.not_admin');
  Route::get('/user/destroy/{id}','UserController@destroy')->name('user.destroy');
  Route::get('/user/profile','ProfileController@index')->name('profile.index');
  Route::post('/user/update','ProfileController@update')->name('profile.update');
  Route::get('/blog/setting', 'SettingController@index')->name('blog.setting');
  Route::post('/blog/setting/update','SettingController@update')->name('setting.update');

});
