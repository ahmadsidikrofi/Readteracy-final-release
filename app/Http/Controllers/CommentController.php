<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Carbon\Carbon;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function add_comment( Request $request )
    {
        try {
            Comment::create($request->all());
            return redirect()->back();
        } catch (\Throwable $err) {
            return redirect()->back()->with('komentarNull', 'Komentar tidak boleh kosong');
        }
    }
}
