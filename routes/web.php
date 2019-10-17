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

$groupAdmin = [
    'namespace' => 'Admin',
    'prefix' => 'admin/'
];
Route::group($groupAdmin, function(){
    Route::resource('users', 'UserController')->names('admin.user');
});

$groupFrontend = [
    'namespace' => 'Frontend',
];
Route::group($groupFrontend, function(){
    $methods = ['index', 'edit', 'update', 'destroy'];
    Route::resource('user', 'UserController')
        ->only($methods)
        ->names('user');
});

Auth::routes();
