<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Carbon\Carbon;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function add_comment( Request $request )
    {
        Comment::create($request->all());
        return redirect()->back();
    }
}
