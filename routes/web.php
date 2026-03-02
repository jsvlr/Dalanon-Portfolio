<?php

use Illuminate\Support\Facades\Route;
use League\Uri\Http;

Route::get('/', [App\Http\Controllers\PageController::class, 'index'])->name('index');

Route::middleware('auth')->group(function(){
    Route::resource('contact', App\Http\Controllers\ContactController::class);
    Route::resource('user', App\Http\Controllers\UserController::class);
    Route::resource('profile', App\Http\Controllers\ProfileController::class);
    Route::resource('about', App\Http\Controllers\AboutController::class);
    Route::resource('skill', App\Http\Controllers\SkillController::class);
    Route::resource('project', \App\Http\Controllers\ProjectController::class);
    Route::resource('message', App\Http\Controllers\MessageController::class);
});


Route::controller(\App\Http\Controllers\LoginLogoutController::class)->prefix('auth')->group(function(){
    Route::middleware('auth')->post('logout', 'logout')->name('auth.logout');
    Route::get('login-form', 'index')->name('auth.loginForm');
    Route::post('login', 'login')->name('auth.login');
});