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

use PhpParser\Builder\Namespace_;

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();

Route::get('/home', 'HomeController@adminPanel')->name('adminPanel');
Route::get('/adminPanel', 'HomeController@adminPanel')->name('adminPanel');



Route::group(['middleware'=>'auth','prefix'=>'permission'],function () {

    Route::post('/store', 'Admin\PermissionController@store');

    Route::get('/create', 'Admin\PermissionController@create');
    Route::get('/list', 'Admin\PermissionController@index');
    Route::get('/edit/{id}',  ['uses'=>'Admin\PermissionController@edit','as'=>'permission-edit'] );
    Route::put('/edit/{id}', ['uses'=>'Admin\PermissionController@update' , 'as' => 'permission-update']);
    Route::delete('/delete/{id}', ['uses'=>'Admin\PermissionController@destroy' , 'as' => 'permission-delete']);



});


// Route::group(['middleware'=>'auth','role'=>'permission'],function () {

//     Route::post('/store', 'Admin\PermissionController@store');

//     Route::get('/create', 'Admin\PermissionController@create');
//     Route::get('/list', 'Admin\PermissionController@index');
//     Route::get('/edit/{id}',  ['uses'=>'Admin\PermissionController@edit','as'=>'permission-edit'] );
//     Route::put('/update/{id}', ['uses'=>'Admin\PermissionController@update' , 'as' => 'permission-update']);




// });




