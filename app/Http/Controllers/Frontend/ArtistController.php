<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Music;
use Illuminate\Http\Request;

class ArtistController extends Controller
{
    // ArtistDetails
    public function ArtistDetails($id){
        $artistData = Music::findOrFail($id);
        return view('frontend.artist.artist_details', compact('artistData'));
    }
    // AllAlbums
    public function AllAlbums(){
        $albumsData = Music::latest()->paginate(6);
        return view('frontend.artist.all_albums', compact('albumsData'));
    }
    public function Contact(){
        return view('frontend.contact.contact_us');
    }
}
