<?php

namespace App\Http\Controllers;

use App\Models\Genre;
use App\Models\Likers;
use Illuminate\Http\Request;
use App\Models\BooksCatalogue;
use App\Models\PeminjamanBuku;

class CatalogueController extends Controller
{
    public function catalogue_page( Request $request )
    {
        $genre = Genre::all();
        $books = BooksCatalogue::latest();
        if ($request->search) {
            $books->filter(['search' => $request->search]);
        }
        if ($request->genre) {
            $books = BooksCatalogue::whereHas('genre', function($query) use($request) {
                $query->where('genre.slug', $request->genre);
            });
        }
        $books = $books->paginate(2);
        $total_search = $books->count();
        $total_books = BooksCatalogue::count();
        return view('books.catalogue', compact(['genre', 'books', 'total_search', 'total_books']));
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
        return redirect('/Readteracy/catalogue')->with('addBook', 'Buku berhasil ditambah');
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

        return redirect('/Readteracy/catalogue')->with('editBook', 'Edit buku berhasil dilakukan');
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
        if ($detail_book) {
            $peminjamanBuku = PeminjamanBuku::where('user_id', $user->id)
            ->where('book_id', $detail_book->id)->orderByDesc('id')->first();
            $like = $detail_book->likers()->count();
            $dislike = $detail_book->dislikers()->count();
            return view('books.detailBook', compact(['detail_book', 'peminjamanBuku', 'genre', 'like', 'dislike']));
        } else {
            return redirect()->back()->with('error', 'maaf buku sudah tidak ada');
        }
    }

    public function detailBook_page_guest( $id )
    {
        $genre = Genre::all();
        $detail_book = BooksCatalogue::findOrFail($id);
        $peminjamanBuku = PeminjamanBuku::where('book_id', $detail_book->id)->orderByDesc('id')->first();
        return view('books.detailBook', compact(['detail_book', 'genre', 'peminjamanBuku']));
    }

    public function baca_buku( $id, Request $request )
    {
        $genre = Genre::all();

        $isi_buku = BooksCatalogue::find($id);
        $genre_related = $isi_buku->genre()->get();
        $related_books = BooksCatalogue::whereHas('genre', function($query) use ($genre_related) {
            $query->whereIn('genre.id', $genre_related->pluck('id'));
        })
        ->where('books_catalogue.id', '!=', $isi_buku->id)
        ->get();
        $content = $isi_buku->isi_buku;
        $words = preg_split('/\s+/', $content); // Memisahkan kata-kata dan tanda baca dalam konten

        return view('books.isiBuku', compact(['isi_buku', 'genre', 'related_books', 'words']));
    }

    public function getNextPage($id, Request $request)
    {
        $isi_buku = BooksCatalogue::find($id);
        $content = $isi_buku->isi_buku;
        $startPosition = $request->query('startPosition', 0);
        $words = preg_split('/\s+/', $content); // Memisahkan kata-kata dan tanda baca dalam konten
        $nextContent = implode(' ', array_slice($words, $startPosition, 50));

        return response()->json([
            'content' => $nextContent,
        ]);
    }


    public function detailBook_page_after_return( $id )
    {
        $genre = Genre::all();
        $user = auth()->user();
        $detail_book = BooksCatalogue::find($id);
        $peminjamanBuku = PeminjamanBuku::where('user_id', $user->id)
        ->where('book_id', $detail_book->id)->orderByDesc('id')->first();
        return view('books.detailBook', compact(['detail_book', 'peminjamanBuku', 'genre', 'like', 'dislike']));
    }
}
