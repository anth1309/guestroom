<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\ReservationController;
use App\Models\Room;
use Illuminate\Support\Facades\Route;

//affiche la page de base
Route::get('/', function () {
    $rooms = Room::all();
    return view('home.index', compact('rooms'));
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
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('login');
Route::delete('/logout', [LoginController::class, 'logout'])->name('logout');


//route Crud une fois loggé
Route::middleware('auth')->group(function () {
    Route::get('/reservations', [ReservationController::class, 'index'])->name('reservations.index');
    Route::get('/reservations/{reservation}', [ReservationController::class, 'show'])->name('reservations.show');
    Route::get('/reservations/{reservation}/edit', [ReservationController::class, 'edit'])->name('reservations.edit');
    Route::put('/reservations/{reservation}', [ReservationController::class, 'update'])->name('reservations.update');
    Route::delete('/reservations/{reservation}', [ReservationController::class, 'destroy'])->name('reservations.destroy');
});
