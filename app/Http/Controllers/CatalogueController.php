<?php

namespace App\Http\Controllers;

use App\Models\Genre;
use Illuminate\Http\Request;
use App\Models\BooksCatalogue;
use App\Models\genreEducation;
use App\Models\PeminjamanBuku;
use App\Models\genreHistorical;

class CatalogueController extends Controller
{
    public function catalogue_page( Request $request )
    {
        $genre = Genre::all();
        if ($request->genre) {
            $books = BooksCatalogue::whereHas('genre', function($query) use($request) {
                $query->where('genre.slug', $request->genre);
            })->get();
        } else {
            $books = BooksCatalogue::latest()->get();
        }
        return view('books.catalogue', compact(['books', 'genre']));
    }


    public function addBook_page()
    {
        $genre = Genre::all();
        return view('books.addBooks', compact(['genre']));
    }

    public function addBook_store( Request $request )
    {
        $books = BooksCatalogue::create($request->except('genre'));
        $books->genre()->sync($request->genre);

        if ( $request -> hasFile("image") ) {
            $request -> file("image")->move("img/buku/", $request->file("image")->getClientOriginalName());
            $books -> image = $request -> file("image")->getClientOriginalName();
            $books -> save();
        }
        return redirect('/Readteracy/catalogue');
    }

    public function editBook_page( $slug )
    {
        $book_edit = BooksCatalogue::where('slug', $slug)->first();
        $genre = Genre::all();
        return view('books.editBooks', compact(['book_edit', 'genre']));
    }

    public function editBook_store( Request $request, $slug )
    {
        $book_edit = BooksCatalogue::where('slug', $slug)->first();
        $book_edit->update($request->except('genre'));
        if ( $request->genre ) {
            $book_edit->genre()->sync($request->genre);
        }

        if ( $request -> hasFile("image") ) {
            $request -> file("image")->move("img/buku/", $request->file("image")->getClientOriginalName());
            $book_edit -> image = $request -> file("image")->getClientOriginalName();
            $book_edit -> save();
        }
        return redirect('/Readteracy/catalogue');
    }

    public function destroy( $slug )
    {
        $book_delete = BooksCatalogue::where('slug', $slug)->first()->delete();
        return redirect('/Readteracy/catalogue');
    }

    public function detailBook_page_userAuth( $id )
    {
        $genre = Genre::all();

        $user = auth()->user();
        $detail_book = BooksCatalogue::find($id);
        $peminjamanBuku = PeminjamanBuku::where('user_id', $user->id)
        ->where('book_id', $detail_book->id)->orderByDesc('id')->first();
        return view('books.detailBook', compact(['detail_book', 'peminjamanBuku', 'genre']));
    }

    public function detailBook_page_guest( $id )
    {
        $genre = Genre::all();
        $detail_book = BooksCatalogue::findOrFail($id);
        $peminjamanBuku = PeminjamanBuku::where('book_id', $detail_book->id)->orderByDesc('id')->first();
        return view('books.detailBook', compact(['detail_book', 'genre', 'peminjamanBuku']));
    }

    public function detailBook_page_after_return( $id )
    {
        $genre = Genre::all();

        $user = auth()->user();
        $detail_book = BooksCatalogue::find($id);
        $peminjamanBuku = PeminjamanBuku::where('user_id', $user->id)
        ->where('book_id', $detail_book->id)->orderByDesc('id')->first();
        return view('books.detailBook', compact(['detail_book', 'peminjamanBuku', 'genre']));
    }
}
