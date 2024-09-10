<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Song;
use App\Models\Playlist;

class SongController extends Controller
{
    /**
     * Show form to create a new song.
     */
    public function create($playlistId)
    {
        $playlist = Playlist::findOrFail($playlistId);
        return view('songs.create', compact('playlist'));
    }

    /**
     * Store a newly created song and attach it to a playlist.
     */
    public function store(Request $request, $playlistId)
{
    $request->validate([
        'title' => 'required',
        'artist' => 'required',
        'genre' => 'required',
    ]);

    $playlist = Playlist::findOrFail($playlistId);
    
    $playlist->songs()->create([
        'title' => $request->input('title'),
        'artist' => $request->input('artist'),
        'genre' => $request->input('genre'),
    ]);

    return redirect()->route('playlist.show', $playlistId)->with('success', 'Song added successfully!');
}

}
