<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Comment;
use Illuminate\Http\Request;
use App\Models\PeminjamanBuku;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class CommentController extends Controller
{
    public function add_comment( Request $request )
    {
        $validator = Validator::make($request->all(), [
            'komentar' => 'required|string'
        ]);
        $isi_buku = PeminjamanBuku::where('slug', $request->slug)->first();
        try {
            Comment::create([
                'book_id' => $isi_buku->id,
                'user_id' => Auth::user()->id,
                'komentar' => $request->komentar
            ]);
            return redirect()->back();
        } catch (\Throwable $err) {
            return redirect()->back()->with('komentarNull', 'Komentar tidak boleh kosong');
        }
    }
}
