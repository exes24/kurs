<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ApplicationController;
use App\Http\Controllers\CourseController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsersController;
use Illuminate\Support\Facades\Auth;


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

Route::get('/', [CourseController::class,"index"]);
Route::post("/enroll", [ApplicationController::class, "create_application"]);

Route::get('/admin', [AdminController::class, "index"]);

Route::get('/application/{id_application}/confirm', [ApplicationController::class, "confirm"]);
Route::post('/add_courses', [AdminController::class, "createCourser"]);
Route::post('add_category', [AdminController::class, "createCategory"]);

Route::get('login', [UsersController::class, "show_login"])->name('login');
Route::post('auth', [UsersController::class, "auth_users"]);

Route::get('/register', [UsersController::class, "show_register"])->name('register');
Route::post('create', [UsersController::class, "create_users"]);

Route::get('users_page', [UsersController::class, "show_page"])->name('users_page');
Route::get('/category_open/{id}', [CourseController::class, "category_open"]);
Route::get('/logout', function(){
    Auth::logout();
    return redirect('/');
})->name('logout');
