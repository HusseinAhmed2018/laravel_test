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
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware'=>'auth'],function (){

    Route::get('/projects','ProjectController@index')->name('projects');
    Route::get('/create-project','ProjectController@create')->name('create.project');
    Route::post('/store-project','ProjectController@store')->name('store.project');
    Route::get('/edit-project/{id}','ProjectController@edit')->name('project.edit');
    Route::put('/update-project/{id}','ProjectController@update')->name('project.update');
    Route::delete('/delete-project/{project}/delete','ProjectController@destory')->name('project.delete');

    Route::get('/tasks','TaskController@index')->name('tasks');
    Route::get('/create-task','TaskController@create')->name('create.task');
    Route::post('/store-task','TaskController@store')->name('store.task');
    Route::get('/edit-task/{id}','TaskController@edit')->name('task.edit');
    Route::put('/update-task/{id}','TaskController@update')->name('task.update');
    Route::delete('/delete-task/{task}/delete','TaskController@destory')->name('task.delete');
});

