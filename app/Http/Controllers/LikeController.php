<?php

namespace App\Http\Controllers;

use App\Models\Likers;
use Illuminate\Http\Request;
use App\Models\BooksCatalogue;
use Illuminate\Support\Facades\DB;

class LikeController extends Controller
{
    public function like_book( Request $request, $id )
    {
        $user = auth()->user();
        $book = BooksCatalogue::findOrFail($id);
        if ($book->likers->contains($user->id)) {
            $book->likers()->detach($user->id); // Melakukan unlike
        } else {
            $book->likers()->attach($user->id); // Melakukan like
        }
        // $like = Likers::updateOrCreate(
        //     ['user_id' => $user->id, 'book_id' => $id],
        //     ['is_like' => true],
        // );
        return redirect()->back();
    }
}
