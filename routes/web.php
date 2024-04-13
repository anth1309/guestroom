<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('rooms.index');
})->name('home');


Route::get('/calendar', function () {
    return view('rooms.calendar');
})->name('calendar');
