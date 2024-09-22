<?php

namespace App\Http\Controllers;

use App\Models\albumss;
use App\Models\songs;
use App\Models\artists;

use Illuminate\Http\Request;

class spotify extends Controller
{
    public function insert_artist(Request $req)
    {
        // Validate request
        $req->validate([
            'artist_name' => 'required|string',
            'artist_image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Adjust validation rules as needed
        ]);

        // Insert artist
        $newArtist = new artists;
        $newArtist->name = $req->artist_name;

        if ($req->hasFile('artist_image')) {
            $image = $req->file('artist_image');
            $imageName = $image->getClientOriginalName(); // Get the original name of the image
            $image->storeAs('public/album_images', $imageName); // Store the image with its original name
            $newArtist->art_image = $imageName; // Save the original name in the database
        }

        $newArtist->save();

        return redirect('artistt');
    }

    //display artist
    public function search_art()
    {
        $newartist = artists::all();
        return view('dis_artist', ['artistt' => $newartist]);
    }
    //delete artist
    public function delete($id)
    {
        $newartist = artists::find($id);
        $newartist->delete();
        return redirect('artistt');
    }
    public function Art_edit($id)
    {
        $newartist = artists::find($id);
        return view('editArtist', ['newartist' => $newartist]);
    }
    public function update(Request $req)
    {
        $newartist = artists::find($req->txtid);
        $newartist->name = $req->artist_name;

        if ($req->hasFile('artist_image')) {
            $image = $req->file('artist_image');
            $imageName = $image->getClientOriginalName(); // Get the original name of the image
            $image->storeAs('public/album_images', $imageName); // Store the image with its original name
            $newartist->art_image = $imageName; // Save the original name in the database
        }
        $newartist->save();

        return redirect('artistt');
    }
    //insert song 
    public function insert_song(Request $req)
    {
        $song = new songs;
        $song->s_name = $req->sname;
        $song->art_id = $req->artist1;
        if ($req->hasFile('simage')) {
            $imageFile = $req->file('simage');
            $imageName = $imageFile->getClientOriginalName(); // Generate a unique image name
            $imagePath = $imageFile->storeAs('public/songs', $imageName); // Store the image in the 'song_images' directory

            // Set the image path in the database
            $song->s_image = 'songs/' . $imageName;
        }
        if ($req->hasFile('sfile')) {
            $file = $req->file('sfile');
            $fileName = $file->getClientOriginalName();
            $filePath = $file->storeAs('songs', $fileName); // Store directly in public/songs
            $song->song_path = 'songs/' . $fileName; // Set the relative file path
        }
        $song->duration = $req->duration;
        $song->save();
        return redirect('songs_form');
    }

    //search song 
    public function search_song()
    {
        $sng = songs::join('artists', 'songs.art_id', '=', 'artists.art_id')->get();
        return view('disp_song', ['sng' => $sng]);
    }

    public function search_songart()
    {
        $sng = artists::all();
        return view('songs_form', ['sng' => $sng]);
    }

    public function s_delete($id)
    {
        $song = songs::find($id);
        $song->delete();
        return redirect('disp_song');
    }
    // render the page for album click event 
    public function album_song_fetch($id){
        $album = albumss::find($id);
        return view('album_song' , compact('album'));
    }

    public function insert_album(Request $req)
    {
        $req->validate([
            'album_name' => 'required|string',
            'album_image' => 'required|image',
            'desc' => 'required|string',
            // 'songs.*' => 'required|array', 
            // 'songs.*' => 'file|mimetypes:audio/mpeg,mpga,mp3,wav'
        ]);

        // Create a new album instance
        $new_alb = new albumss;
        $new_alb->a_name = $req->album_name;

        // Upload album image
       // Upload album image
       if ($req->hasFile('album_image')) {
        $imagePath = $req->file('album_image');
        $imageName = $imagePath->getClientOriginalName();
        $imagP = $imagePath->storeAs('public/album_images', $imageName); // Store directly in public/songs
        $new_alb->image_path =  $imageName;            
    }
    

        $new_alb->description = $req->desc;
        $new_alb->s_id = $req->album_songs;
        // Attach songs to the album

        $new_alb->save();
        $new_alb->songs()->attach($req->album_songs);

        // return view('albums', ['new_alb' => $new_alb]);
        return redirect('albums');
    }
    public function a_delete($id)
    {
        $new_alb = albumss::find($id);
        $new_alb->delete();
        return redirect('disp_alb');
    }
    // join 
    public function join_album()
    {
        $song = albumss::join('songs', 'albumss.s_id', '=', 'songs.s_id')->get();
        return view('disp_alb', ['song' => $song]);
    }

    public function search_a()
    {
        $song = songs::all();
        return view('albums', ['song' => $song]); // Pass the songs to the view
    }


    public function wel_album()
    {
        $songs = songs::all();
        $albums = albumss::with('songs')->get(); // Retrieve all albums with their associated songs
        return view('welcome', compact('albums' , 'songs'));
    }


}
