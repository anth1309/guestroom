<?php

namespace App\Http\Controllers;

use App\Mail\ReservationMail;
use App\Mail\TestMail;
use App\Models\Reservation;
use App\Models\Room;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class ReservationController extends Controller
{

    public function getReservations(Request $request)
    {
        $reservations = Reservation::all();
        $events = [];
        foreach ($reservations as $reservation) {
            $roomName = Room::find($reservation->room_id)->name;
            $startDate = Carbon::parse($reservation->start_date);
            $endDate = Carbon::parse($reservation->end_date);

            while ($startDate < $endDate) {
                $events[] = [
                    'title' => $roomName,
                    'start' => $startDate->toDateString(),
                    'end' => $startDate->toDateString(),
                    'roomName' => $roomName,
                ];
                $startDate->addDay();
            }
        }

        return response()->json($events);
    }

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
            'comment' => 'nullable|string|max:255',
            'adults' => 'required|integer|min:1',
            'children' => 'required|integer|min:0',
            'bed' => 'required|boolean',
        ]);

        $currentYear = date('Y');
        $currentMonth = date('m');
        $reservationId = DB::table('reservations')->insertGetId([
            'room_id' => $request->room_id,
            'lastname' => $request->lastname,
            'firstname' => $request->firstname,
            'email' => $request->email,
            'phone' => $request->phone,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'comment' => $request->comment,
            'adult' => $request->adults,
            'children' => $request->children,
            'bed' => $request->bed,
            'price' => 10, // Prix fixe de 10
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        $reservationNumber = $currentYear . '-' . $currentMonth . '-' . $reservationId;
        DB::table('reservations')->where('id', $reservationId)->update(['reservation_number' => $reservationNumber]);
        $reservation = Reservation::findOrFail($reservationId);
        $mail = $reservation->email;
        Mail::to($mail)->send(new ReservationMail($reservation));

        return redirect()->route('home')->with('success', 'Votre réservation a été enregistrée avec succès.');
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
