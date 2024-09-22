<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Artists;

class ArtistController extends Controller
{
    public function index()
    {
        // Fetch all artists from the database
        $artists = Artists::all();

        // Pass the artists data to the view
        return view('artists.index', compact('artists'));
    }

    // Create a new artist
    public function create(Request $request)
    {
        // Validate request data
        $request->validate([
            'name' => 'required|string',
            'genre' => 'required|string',
            // Add more validation rules as needed
        ]);

        // Create a new artist
        $artist = new Artists();
        $artist->name = $request->input('name');
        $artist->genre = $request->input('genre');
        // Set other fields as needed
        $artist->save();

        return response()->json(['message' => 'Artist created successfully', 'data' => $artist], 201);
    }

    // Read an artist by ID
    public function read($id)
    {
        $artist = Artists::find($id);

        if (!$artist) {
            return response()->json(['message' => 'Artist not found'], 404);
        }

        return response()->json(['data' => $artist], 200);
    }

    // Update an existing artist
    public function update(Request $request, $id)
    {
        $artist = Artists::find($id);

        if (!$artist) {
            return response()->json(['message' => 'Artist not found'], 404);
        }

        // Validate request data
        $request->validate([
            'name' => 'required|string',
            'genre' => 'required|string',
            // Add more validation rules as needed
        ]);

        // Update artist fields
        $artist->name = $request->input('name');
        $artist->genre = $request->input('genre');
        // Update other fields as needed
        $artist->save();

        return response()->json(['message' => 'Artist updated successfully', 'data' => $artist], 200);
    }

    // Delete an artist
    public function delete($id)
    {
        $artist = Artists::find($id);

        if (!$artist) {
            return response()->json(['message' => 'Artist not found'], 404);
        }

        $artist->delete();

        return response()->json(['message' => 'Artist deleted successfully'], 200);
    }
}
