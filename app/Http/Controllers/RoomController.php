<?php

namespace App\Http\Controllers;

use App\Models\Room;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class RoomController extends Controller
{

    public function show(Room $room)
    {
        return view('rooms.show', compact('room'));
    }
    public function index()
    {
        $rooms = Room::all();
        return view('rooms.index', compact('rooms'));
    }


    public function create()
    {
        return view('rooms.edit');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'capacity' => 'required|integer|min:1',
            'price_weekend' => 'required|numeric|min:0',
            'price_week' => 'required|numeric|min:0',
            'description' => 'required|string',
            'images.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $room = new Room([
            'name' => $request->name,
            'capacity' => $request->capacity,
            'weekend_price' => $request->price_weekend,
            'weekly_price' => $request->price_week,
            'description' => $request->description,
        ]);

        $room->save();

        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $imagePath = $image->store('room_images/' . $room->name, 'public');
                $room->images()->create(['image_path' => $imagePath]);
            }
        }

        return redirect()->route('rooms.index')
            ->with('success', 'Chambre créée avec succès.');
    }


    public function edit(Room $room)
    {
        return view('rooms.edit', compact('room'));
    }

    public function update(Request $request, Room $room)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'capacity' => 'required|integer|min:1',
            'price_weekend' => 'required|numeric|min:0',
            'price_week' => 'required|numeric|min:0',
            'description' => 'required|string',
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {

                $imagePath = $image->store('room_images/' . $room->name, 'public');
                $room->images()->create(['image_path' => $imagePath]);
            }
        }
        $room->update([
            'name' => $request->name,
            'capacity' => $request->capacity,
            'weekend_price' => $request->price_weekend,
            'weekly_price' => $request->price_week,
            'description' => $request->description,
        ]);

        return redirect()->route('rooms.index')
            ->with('success', 'Chambre mise à jour avec succès.');
    }



    public function destroy(Room $room)
    {
        $room->delete();

        return redirect()->route('rooms.index')
            ->with('success', 'Room deleted successfully.');
    }
}
