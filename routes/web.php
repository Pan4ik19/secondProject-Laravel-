<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\EntryContoller;
use App\Http\Controllers\MainController;
use Illuminate\Support\Facades\Route;
use \Illuminate\Support\Facades\Auth;
use App\Http\Controllers\UserController;
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

Route::name('user.')->group(function (){
    Route::get('/registration',[UserController::class,'getRegistration'])->name('registration');
    Route::get('/login',[UserController::class,'getLogin'])->name('login');
    Route::get('/logout',[UserController::class, 'logout'])->name('logout');
    Route::post('/login',[UserController::class, 'login']);
    Route::post('/registration',[UserController::class, 'registration']);
});

Route::name('main.')->group(function (){
    Route::get('/',[MainController::class,'index'])->name('main');
    Route::post('/addCategory',[CategoryController::class,'addCategory'])->name('addCategory');
    Route::post('/addEntry',[EntryContoller::class,'addEntry'])->name('addEntry');
});

Route::name('vue.')->group(function (){
    Route::get('/categories',[CategoryController::class,'getCategories']);
    Route::get('/entries',[EntryContoller::class,'getEntries']);
    Route::get('/getAuthUser',[MainController::class,'getAuthUser']);
    Route::get('/updateEntry',[EntryContoller::class, 'updateEntry']);
});




Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
