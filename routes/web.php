<?php

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
//    $views = ['/'=>'private',
//              '/login'=>'login',
//              '/registration'=>'registration'];

    Route::view('/', 'private')->middleware('auth')->name('private');

    Route::get('/registration',function (){
        if(Auth::check()){
            return redirect(view('/'));
        }
        return view('registration');
    })->name('registration');

    Route::get('/login',function (){
        if(Auth::check()){
            return redirect(view('/'));
        }
        return view('login');
    })->name('login');

    Route::get('/logout',[UserController::class, 'logout'])->name('logout');
    Route::post('/login',[UserController::class, 'login']);
    Route::post('/registration',[UserController::class, 'registration']);
});





