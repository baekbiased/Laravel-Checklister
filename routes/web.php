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

Route::redirect('/', 'welcome');


Auth::routes();

Route::group(['middleware' => 'auth'], function() {

    Route::get('welcome', [\App\Http\Controllers\PageController::class, 'welcome'])->name('welcome');
    Route::get('consultation', [\App\Http\Controllers\PageController::class, 'consultation'])->name('consultation');
    Route::get('checklists/{checklist}', [\App\Http\Controllers\User\ChecklistController::class, 'show'])->name('user.checklists.show');

    Route::group(['prefix' => 'admin', 'as' => 'admin.', 'middleware' => 'is_admin'], function() {
        Route::resource('pages', App\Http\Controllers\admin\PageController::class)->only(['edit', 'update']);
        Route::resource('checklist_groups', App\Http\Controllers\admin\ChecklistGroupController::class);
        Route::resource('checklist_groups.checklists', App\Http\Controllers\admin\ChecklistController::class);
        Route::resource('checklists.tasks', App\Http\Controllers\admin\TaskController::class);
        Route::get('users', [App\Http\Controllers\admin\UserController::class, 'index'])->name('users');
    });
});
