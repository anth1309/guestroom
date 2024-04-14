<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use Illuminate\Http\Request;

class ReservationController extends Controller
{
    public function index()
    {
        $reservations = Reservation::all();
        return view('reservation.index', compact('reservations'));
    }


    public function create($roomId, $roomName)
    {
        return view('reservation.create', ['roomId' => $roomId, 'roomName' => $roomName]);
    }

    public function store(Request $request)
    {

        $request->validate([
            'room_id' => 'required|exists:rooms,id',
            'lastname' => 'required|string|max:255',
            'firstname' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:20',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
        ]);


        Reservation::create($request->all());

        return redirect()->route('home')
            ->with('success', 'Votre réservation a été enregistrée avec succès.Veuillez vérifier vos courriels.Merci');
    }



    public function show($id)
    {
        $reservation = Reservation::findOrFail($id);
        return view('reservation.show', compact('reservation'));
    }


    public function edit($id)
    {
        $reservation = Reservation::findOrFail($id);
        return view('reservation.edit', compact('reservation'));
    }


    public function update(Request $request, $id)
    {

        $request->validate([]);


        $reservation = Reservation::findOrFail($id);
        $reservation->update($request->all());


        return redirect()->route('reservations.index')
            ->with('success', 'La réservation a été mise à jour avec succès.');
    }


    public function destroy($id)
    {

        $reservation = Reservation::findOrFail($id);
        $reservation->delete();


        return redirect()->route('reservations.index')
            ->with('success', 'La réservation a été supprimée avec succès.');
    }
}
