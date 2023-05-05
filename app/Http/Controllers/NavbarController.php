<?php

namespace App\Http\Controllers;

use App\Models\BooksCatalogue;
use App\Models\Genre;
use Illuminate\Http\Request;

class NavbarController extends Controller
{
    public function all_genre_navbarAuth()
    {
        $genre = Genre::all();
        $booksLeft = BooksCatalogue::latest()->take(2)->get();
        $booksRight = BooksCatalogue::latest()->take(2)->skip(2)->get();
        return view('home', compact(["genre", "booksLeft", "booksRight"]));
    }
    public function all_genre_navbarGuest()
    {
        $genre = Genre::all();
        $booksLeft = BooksCatalogue::latest()->take(2)->get();
        $booksRight = BooksCatalogue::latest()->take(2)->skip(2)->get();
        return view('homeGuest', compact(["genre", "booksLeft", "booksRight"]));
    }
}
