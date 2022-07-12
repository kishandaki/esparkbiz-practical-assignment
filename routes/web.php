<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\FormApplyController;
use App\Http\Controllers\Admin\ApplicationController;
use App\Http\Controllers\Admin\UserController;

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


Route::get('/form-apply', [FormApplyController::class, 'index'])->name('form');
Route::post('/form-apply', [FormApplyController::class, 'saveForm'])->name('save.form');


/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
|
*/

Route::group(['middleware' => ['is_admin'], 'prefix' => 'admin', 'as' => 'admin.'], function () {
    Route::get('home', [HomeController::class, 'adminHome'])->name('home');

    /*
    |--------------------------------------------------------------------------
    | User Routes
    |--------------------------------------------------------------------------
    */
    Route::resource('users', UserController::class);
    Route::post('users/search', [UserController::class, 'search'])->name('users.search');
    Route::post('users/status/{user}', [UserController::class, 'changeStatus'])->name('users.status');
    Route::get('users/{user}/results', [UserController::class, 'userResults'])->name('users.results');


    Route::resource('applications', ApplicationController::class);
    Route::post('applications/search', [ApplicationController::class, 'search'])->name('applications.search');




});
