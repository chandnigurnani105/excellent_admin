<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\AuthManager;
use App\Http\Controllers\GooglePieController;

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

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::group(['middleware' => ['auth']], function() {
    Route::resource('roles', RoleController::class)->middleware('role:Admin');
    Route::resource('users', UserController::class);
});

Route::get('/target', [AuthManager::class, 'index'])->name('target.index');

Route::post('/target', [AuthManager::class, 'create'])->name('target.create');
Route::get('/targets', [AuthManager::class, 'show'])->name('target.show');
Route::get('/target/{user}', [AuthManager::class, 'show'])->name('user.target.create');

