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


Route::get('/', function () {
    return view('auth.login');
});
Auth::routes();
Route::get('/home', 'HomeController@adminPanel')->name('adminPanel');
Route::get('/adminPanel', 'HomeController@adminPanel')->name('adminPanel');







Route::group(['middleware'=>['auth','permission:permission list|All|permission'],'prefix'=>'permission'],function () {

    Route::post('/store', 'Admin\PermissionController@store');

    Route::get('/create', 'Admin\PermissionController@create');
    Route::get('/list', 'Admin\PermissionController@index');
    Route::get('/edit/{id}',  ['uses'=>'Admin\PermissionController@edit','as'=>'permission-edit'] );
    Route::delete('/delete/{id}', ['uses'=>'Admin\PermissionController@destroy' , 'as' => 'permission-delete']);



});


Route::group(['middleware'=>'auth','prefix'=> 'role'],function () {
     
    Route::get('/list', 'Admin\RoleController@index');
    Route::get('/create', 'Admin\RoleController@create');
    Route::post('/store', 'Admin\RoleController@store');
    Route::get('/edit/{id}',  ['uses'=>'Admin\RoleController@edit','as'=>'role-edit'] );
    Route::put('/update/{id}',  ['uses'=>'Admin\RoleController@update','as'=>'role-update'] );
 
    Route::delete('/delete/{id}', ['uses'=>'Admin\RoleController@destroy' , 'as' => 'role-delete']);




});


Route::group(['middleware'=>'auth','prefix'=> 'author'],function () {
     
    Route::get('/list', 'Admin\AuthorController@index');
    Route::get('/create', 'Admin\AuthorController@create');
    Route::post('/store', 'Admin\AuthorController@store');
    Route::get('/edit/{id}',  ['uses'=>'Admin\AuthorController@edit','as'=>'author-edit'] );
    Route::put('/update/{id}',  ['uses'=>'Admin\AuthorController@update','as'=>'author-update'] );
    Route::delete('/delete/{id}', ['uses'=>'Admin\AuthorController@destroy' , 'as' => 'author-delete']);

});


Route::group(['middleware'=>['auth','permission:Category List|All'],'prefix'=> 'category'],function () {
     
    Route::get('/list', 'Admin\CategoryController@index');
    Route::get('/create', 'Admin\CategoryController@create');
    Route::post('/store', 'Admin\CategoryController@store');
    Route::get('/edit/{id}',  ['uses'=>'Admin\CategoryController@edit','as'=>'Category-edit'] );
    Route::put('/update/{id}',  ['uses'=>'Admin\CategoryController@update','as'=>'Category-update'] );
    Route::delete('/delete/{id}', ['uses'=>'Admin\CategoryController@destroy' , 'as' => 'Category-delete']);

});





