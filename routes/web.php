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
// Авторизация
Route::get('/', function () {
    /*
    if (Auth::check()) {
        return redirect(route('profile'));
    }
    */
    return view('authorization');
})->name('aut');

Route::post('/authorization', 'AuthorizationController@authorizate')->name('post-aut');

// Регистрация
Route::get('/registration', function () {
    /*
    if (Auth::check()) {
        return redirect(route('profile'));
    }
    */
    return view('registration'); 
})->name('reg');

Route::post('/registration', 'RegisterController@register')->name('post-reg');

// Выход 
Route::get('/logout', function () {
    Auth::logout();
    return redirect('/');
});

// Профиль
Route::get('/profile/{id}', 'ProfileController@show')->name('profile');

// Комментарий
Route::post('/comment', 'ProfileController@statusComment')->name('comment');