<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Genre;
use Illuminate\Http\Request;
use App\Models\PeminjamanBuku;
use App\Models\genreHistorical;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;

class PeminjamanBukuController extends Controller
{
    public function viewPage_historyPeminjaman()
    {
        $genre = Genre::all();
        $user = auth()->user();
        $peminjaman = PeminjamanBuku::with('book')->where('user_id', $user->id)->latest()->get();
        return view('history', compact(['peminjaman', 'genre']));
    }

    public function pinjam_buku_nonFisik( Request $request )
    {
        $request["rent_date"] = Carbon::now()->toDateString();
        $request["return_date"] = Carbon::now()->addDay(1)->toDateString();
        // $book = genreHistorical::findOrFail($request->book_id)->only('status');

        try {
            DB::beginTransaction();
            PeminjamanBuku::create($request->except('genre'));
            DB::commit();

            $borrowedBook = PeminjamanBuku::where('user_id', $request->user_id)
            ->where('book_id', $request->book_id)->where('actual_return_date', $request->actual_return_date);
            $bookData = $borrowedBook->first();
            $countData = $borrowedBook->count();
            if ( $request["rent_date"] === $request["return_date"] ) {
                if ( $countData === 1 ) {
                    $bookData->actual_return_date = Carbon::now()->toDateString();
                    $bookData->status = "dikembalikan";
                    $bookData->save();
                }
            }

            Session::flash('message', 'Sewa buku berhasil!');
            Session::flash('alert-class', 'alert-success');
            return Redirect::back();

        } catch (\Throwable $throw) {
            DB::rollback();
            dd($throw);
        }

    }

    public function pinjam_buku_fisik( Request $request )
    {
        $rent_date = Carbon::parse($request->rent_date);
        $return_date = $request["return_date"] = $rent_date->addDay(3)->toDateString();

        try {
            $tipe = $request->input("tipe");

            DB::beginTransaction();
            PeminjamanBuku::create($request->except('genre'));
            DB::commit();
            return Redirect::back()->with('bukuFisik_terpinjam');

        } catch (\Throwable $throw) {
            DB::rollback();
            return redirect()->back()->with('rent_date_null', "Harap mengisi tanggal peminjaman");
        }
    }

    public function return_book( Request $request)
    {
        $borrowedBook = PeminjamanBuku::where('user_id', $request->user_id)
        ->where('book_id', $request->book_id)
        ->where('id', $request->id)
        ->where('actual_return_date', $request->actual_return_date);
        $bookData = $borrowedBook->first();
        $countData = $borrowedBook->count();

        if ( $countData == 1 ) {
            $bookData->actual_return_date = Carbon::now()->toDateString();
            $bookData->status = "dikembalikan";
            $bookData->save();
        }
        return redirect()->back();
    }

    public function viewPage_dataPeminjaman()
    {
        $genre = Genre::all();
        $borrowedBooks = PeminjamanBuku::latest()->get();
        $notify = PeminjamanBuku::where('status', 'in stock')->first();
        // apabila ingin mendapatkan data tetapi tidak
        // bisa pakai get karna collection tidak ada pada instance bisa memakai first
        $siPeminjam = User::all();
        $count_sedangDipinjam = PeminjamanBuku::where('status', 'sedang dipinjam')->count();
        $count_dikembalikan = PeminjamanBuku::where('status', 'dikembalikan')->count();
        $count_inStock = PeminjamanBuku::where('status', 'in stock')->count();
        return view('dataPeminjaman2', compact([
            'borrowedBooks', "siPeminjam", 'genre', 'notify',
            'count_sedangDipinjam', 'count_dikembalikan', 'count_inStock'
        ]));
    }

    public function ubah_status( Request $request, $id )
    {
        $status = $request->input('status');
        DB::table('peminjaman_buku')
        ->where('id', $id)
        ->update([
            'status' => $status,
        ]);

        return redirect()->back();
    }
}
