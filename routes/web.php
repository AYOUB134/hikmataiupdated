<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/contact', function () {
    return view('contact');
})->name('contact');

Route::get('/about', function () {
    return view('about');
})->name('about');




Route::get('/freeplan', function () {
    return view('freeplan');
})->name('freeplan');



Route::get('/premiumplan', function () {
    return view('premiumplan');
})->name('premiumplan.blade');



Route::get('/forgetpassword', function () {
    return view('forgetpassword');
})->name('forgetpassword');




Route::get('/login', function () {
    return view('login');
})->name('login');



Route::get('/register', function () {
    return view('register');
})->name('register');






