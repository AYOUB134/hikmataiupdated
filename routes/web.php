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


// <!-- premium code  -->
Route::get('/premiumplan', function () {
    return view('premiumplan');
})->name('premiumplan');

Route::get('/premiumplan/quiz', function () {
    return view('quiz');
})->name('quiz');


Route::get('/premiumplan/tadreesimansooba', function () {
    return view('tadreesimansooba');
})->name('tadreesimansooba');


Route::get('/premiumplan/story', function () {
    return view('story');
})->name('story');


Route::get('/userprofile', function () {
    return view('userprofile');
})->name('userprofile');




Route::get('/forgetpassword', function () {
    return view('forgetpassword');
})->name('forgetpassword');




Route::get('/login', function () {
    return view('login');
})->name('login');



Route::get('/register', function () {
    return view('register');
})->name('register');






Route::get('/terms-and-conditions', function () {
    return view('terms-and-conditions');
})->name('terms-and-conditions');


Route::get('/refund-policy', function () {
    return view('refund-policy');
})->name('refund-policy');




Route::get('/privacy-policy', function () {
    return view('privacy-policy');
})->name('privacy-policy');





