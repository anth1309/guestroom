<?php

namespace App\Http\Controllers;

use App\Models\RoomImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ImageController extends Controller
{
    public function destroy($id)
    {

        $image = RoomImage::findOrFail($id);
        Storage::delete('storage/' . $image->image_path);
        $image->delete();
        return redirect()->back()->with('success', 'Image supprimée avec succès.');
    }
}
