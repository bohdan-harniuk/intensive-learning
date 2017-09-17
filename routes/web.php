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
    return view('landing');
});

Route::get('/lesons_group', function () {
    return view('user.leson_group.lesons_group');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/admin', [
    'uses' => 'AppController@getAdminDashboard',
    'as' => 'admin.dashboard',
    'middleware' => 'roles',
    'roles' => ['Admin'],
    ]);

Route::get('/admin_roles', [
    'uses' => 'admin\tables\TablesController@index',
    'as' => 'admin.assign',
    'middleware' => 'roles',
    'roles' => ['Admin'],
    ]);

Route::post('/admin_roles', [
    'uses' => 'admin\tables\TablesController@postAdminAssignRoles',
    'as' => 'admin.assign',
    ]);

Route::resource('lessons_group', 'study\LessonsGroupController');
Route::resource('lessons', 'study\LessonsController');