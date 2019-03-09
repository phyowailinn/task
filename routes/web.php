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
    return redirect()->route('login');
});

Auth::routes();

/* tasks group */
Route::get('/tasks', 'TaskController@index')->name('tasks.index');
Route::get('/tasks/get/{id?}','TaskController@getTask')->name('tasks.get');
Route::post('/tasks/store','TaskController@store')->name('tasks.store');
Route::put('/tasks/update/{id?}','TaskController@update')->name('tasks.update');
Route::delete('tasks/delete/{task}','TaskController@destroy')->name('tasks.destroy');

/* users group */
Route::get('/users', 'TaskController@indexUser')->name('users');
Route::get('/users/get/{id?}','TaskController@getUser')->name('users.get');
Route::post('/users/post/{id?}','TaskController@postUser')->name('users.post');
Route::delete('users/delete/{user}','TaskController@deleteUser')->name('users.delete');

