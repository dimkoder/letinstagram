<?php

use App\Http\Controllers\MainController;
use Illuminate\Support\Facades\Route;

//Route::get('/', [MainController::class, 'index'] );
Route::get('/', [MainController::class, 'index'] )->name('home');
Route::get('test', [MainController::class, 'php'] );

Route::post('/register', [MainController::class, 'register'])->name('register');

//Получить пользователя по id-номеру:
Route::get('/profile/{id}', [MainController::class, 'profile'])->name('profile');

//Route::get('/', function () { return view('welcome'); });
