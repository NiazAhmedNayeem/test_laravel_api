<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\PeopleAuthController;
use App\Http\Controllers\DashboardController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});




Route::get('/login', [PeopleAuthController::class, 'index'])->name('login');
Route::post('/login', [PeopleAuthController::class, 'login'])->name('login');
Route::get('/register', [PeopleAuthController::class, 'register'])->name('register');
Route::post('/register', [PeopleAuthController::class, 'create'])->name('create.user');





Route::middleware('people')->group(function (){

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::get('/manage-blogs', [BlogController::class, 'manage_blogs'])->name('manage.blogs');
    Route::get('/add-blog', [BlogController::class, 'add_blog'])->name('add.blog');
    Route::post('/create-blog', [BlogController::class, 'create'])->name('create.blog');
    Route::get('/edit-blog/{id}', [BlogController::class, 'edit'])->name('edit.blog');
    Route::post('/update-blog/{id}', [BlogController::class, 'update'])->name('update.blog');
    Route::get('/delete-blog/{id}', [BlogController::class, 'delete'])->name('delete.blog');
});
