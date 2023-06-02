<?php

namespace App\Http\Controllers;

use App\Models\Genre;
use Illuminate\Http\Request;
use App\Models\BooksCatalogue;
use Illuminate\Support\Facades\Auth;

class NavbarController extends Controller
{
    public function all_genre_navbarAuth()
    {
        $genre = Genre::all();
        $booksLeft = BooksCatalogue::latest()->take(2)->get();
        $booksRight = BooksCatalogue::latest()->take(2)->skip(2)->get();
        if (!Auth::user()) {
            return view('homeGuest', compact(["genre", "booksLeft", "booksRight"]));
        }
        return view('home', compact(["genre", "booksLeft", "booksRight"]));
    }
    public function all_genre_navbarGuest()
    {
        $genre = Genre::all();
        $booksLeft = BooksCatalogue::latest()->take(2)->get();
        $booksRight = BooksCatalogue::latest()->take(2)->skip(2)->get();
        return view('homeGuest', compact(["genre", "booksLeft", "booksRight"]));
    }

    public function notification()
    {
        $genre = Genre::all();
        return view('notification',compact(["genre"]));
    }

    public function viewPage_about()
    {
        $genre = Genre::all();
        return view('aboutUs', compact('genre'));
    }
}
