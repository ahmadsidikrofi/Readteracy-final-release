<?php

namespace App\Http\Controllers;

use App\Models\Likers;
use Illuminate\Http\Request;
use App\Models\BooksCatalogue;
use App\Models\Dislikers;
use Illuminate\Support\Facades\DB;

class LikeController extends Controller
{
    public function like_dislike( Request $request, $id )
    {
        $user = auth()->user();
        $book = BooksCatalogue::findOrFail($id);
        if ($request->has('is_like')) {
            if ($book->likers->contains($user->id)) {
                $book->likers()->detach($user->id); // Melakukan unlike
                Likers::where('user_id', $user->id)->where('book_id', $id)->delete(); // menghapus status like
            } else {
                $book->likers()->attach($user->id); // Melakukan like
                if ($book->dislikers->contains($user->id)) {
                    $book->dislikers()->detach($user->id);
                    Dislikers::where('user_id', $user->id)->where('book_id', $id)->delete();
                }
                Likers::updateOrCreate(
                    ['user_id' => $user->id, 'book_id' => $id],
                    ['is_like' => true],
                );
                return redirect()->back()->with('is_like','Kamu suka bukunya 😍');
            }
        }

        if ( $request->has('is_dislike') ) {
            if ($book->dislikers->contains($user->id)) {
                $book->dislikers()->detach($user->id); // Melakukan undislike
                Dislikers::where('user_id', $user->id)->where('book_id', $id)->delete(); // menghapus status like
            } else {
                $book->dislikers()->attach($user->id); // Melakukan dislike
                if ($book->likers->contains($user->id)) {
                    $book->likers()->detach($user->id);
                    Likers::where('user_id', $user->id)->where('book_id', $id)->delete();
                }
                Dislikers::updateOrCreate(
                    ['user_id' => $user->id, 'book_id' => $id],
                    ['is_dislike' => true],
                );
                return redirect()->back()->with('is_dislike','Kenapa gasuka bukunya? 😠');
            }
        }
        return redirect()->back();
    }
}
