<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['middleware' => 'auth'], function() {
    Route::group(['prefix' => 'admin', 'as' => 'admin.', 'middleware' => 'is_admin'], function() {
        Route::resource('pages', App\Http\Controllers\admin\PageController::class);
        Route::resource('checklist_groups', App\Http\Controllers\admin\ChecklistGroupController::class);
        Route::resource('checklist_groups.checklists', App\Http\Controllers\admin\ChecklistController::class);
        Route::resource('checklists.tasks', App\Http\Controllers\admin\TaskController::class);
    });
});
