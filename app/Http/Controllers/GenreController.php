<?php

namespace App\Http\Controllers;

use App\Models\Genre;
use Illuminate\Http\Request;

class GenreController extends Controller
{
    public function genreList()
    {
        $genreList = Genre::all();
        return view('genre.bookGenre', compact(['genreList']));
    }

    public function addGenre_page()
    {
        $genre = Genre::all();
        return view('genre.addGenre', compact(['genre']));
    }

    public function addGenre_store( Request $request )
    {
        $validate = $request->validate([
            'nama_genre' => 'required|unique:genre|max:100',
        ]);
        $addGenre = Genre::create($request->all());
        return redirect('/Readteracy/genre/genreList')->with('berhasilTambah_genre', 'Genre berhasil ditambahkan');
    }

    public function editGenre_page( $slug )
    {
        $genre = Genre::all();
        // $editGenre = Genre::find($slug);
        $editGenre = Genre::where('slug', $slug)->first();
        return view('genre.editGenre', compact(['editGenre', 'genre']));
    }

    public function editGenre_store( Request $request, $slug )
    {
        $validate = $request->validate([
            'nama_genre' => 'required|unique:genre|max:100',
        ]);
        $editGenre = Genre::where('slug', $slug)->first();
        $editGenre->slug = NULL;
        $editGenre->update($request->all());
        return redirect('/Readteracy/genre/genreList')->with('berhasilEdit_genre', 'Genre berhasil diedit');
    }

    public function delete_genre( $slug )
    {
        $deleteGenre = Genre::where('slug', $slug)->first();
        $deleteGenre->delete();
        return redirect('/Readteracy/genre/genreList')->with('delete', 'Genre berhasil dihapus');
    }

}
