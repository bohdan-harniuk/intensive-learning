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

Route::get('/', 'AppController@getLanding')->name('index');

Route::get('/exercises', function () {
    return view('exercises');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/admin', [
    'uses' => 'AppController@getAdminDashboard',
    'as' => 'admin.dashboard',
    'middleware' => 'roles',
    'roles' => ['Admin','Author','User'],
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

Route::resource('/lessons_group', 'study\LessonsGroupController', ['names' => [
    'index' => 'lessons_group.index',
    'create' => 'lessons_group.create',
    'show' => 'lessons_group.show',
    'edit' => 'lessons_group.edit',
    'destroy' => 'lessons_group.delete',
]]);
Route::get('/courses/{filename}', [
    'uses' => 'study\LessonsGroupController@getLessonsGroupImage',
    'as' => 'lessons_group.image',
]);
Route::resource('/lessons', 'study\LessonsController', ['names' => [
    'create' => 'lesson.create',
    'show' => 'lesson.show',
    'edit' => 'lesson.edit',
    'destroy' => 'lesson.delete',
]]);
Route::post('/lesson_block', 'study\LBlockController@store')->name('l_block.store');
Route::put('/lesson_block/{id}', 'study\LBlockController@update')->name('l_block.update');
Route::delete('/lesson_block/{id}', 'study\LBlockController@destroy')->name('l_block.delete');