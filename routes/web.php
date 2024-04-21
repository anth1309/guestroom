<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\RoomController;
use App\Models\Room;
use App\Models\RoomImage;
use Illuminate\Support\Facades\Route;

//affiche la page de base
Route::get('/', function () {
    $rooms = Room::all();
    $images = RoomImage::all();
    return view('home.index', compact('rooms', 'images'));
})->name('home');

//affiche la page prix
Route::get('/price', function () {
    return view('rooms.price');
})->name('price');

//affichage d une chambre
Route::get('/room/{id}', function ($id) {
    $room = Room::findOrFail($id);
    return view('rooms.room', compact('room'));
})->name('room');

//met a jour calendar et l affiche
Route::get('/get-reservations', [ReservationController::class, 'getReservations']);
Route::get('/calendar', function () {
    return view(' home.calendar');
})->name('calendar');

//affichage form resa et store resa
Route::get('/reservation/create/{roomId}/{roomName}', [ReservationController::class, 'create'])->name('reservation.create');
Route::post('/reservations', [ReservationController::class, 'store'])->name('reservations.store');




//route log admin pour la gestion
Route::get('/admin-login/gestion', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('login');

//route Crud une fois loggé
Route::middleware('auth')->group(function () {
    Route::get('/reservations', [ReservationController::class, 'index'])->name('reservations.index');
    Route::get('/reservations/{room}', [ReservationController::class, 'show'])->name('reservations.show');
    Route::get('/reservations/{room}/edit', [ReservationController::class, 'edit'])->name('reservations.edit');
    Route::put('/reservations/{room}', [ReservationController::class, 'update'])->name('reservations.update');
    Route::delete('/reservations/{room}', [ReservationController::class, 'destroy'])->name('reservations.destroy');

    Route::get('/rooms', [RoomController::class, 'index'])->name('rooms.index');
    Route::get('/rooms/{room}', [RoomController::class, 'show'])->name('rooms.show');

    Route::get('/rooms/create/new', [RoomController::class, 'create'])->name('rooms.create');
    Route::post('/rooms', [RoomController::class, 'store'])->name('rooms.store');

    Route::get('/rooms/{room}/edit', [RoomController::class, 'edit'])->name('rooms.edit');
    Route::put('/rooms/{room}', [RoomController::class, 'update'])->name('rooms.update');
    Route::delete('/rooms/{room}', [RoomController::class, 'destroy'])->name('rooms.destroy');

    Route::delete('/images/{id}', [ImageController::class, 'destroy'])->name('image.destroy');

    Route::delete('/logout', [LoginController::class, 'logout'])->name('logout');
});
