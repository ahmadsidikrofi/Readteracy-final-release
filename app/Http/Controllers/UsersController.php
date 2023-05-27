<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Genre;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class UsersController extends Controller
{
    public function listUser_page()
    {
        $genre = Genre::all();
        $users = User::where('role', '!=' ,'1')->get();
        return view('user.listUser', compact(['users', 'genre']));
    }

    public function profileUser_page($id)
    {
        $genre = Genre::all();
        $userProfile = User::findOrFail($id);
        return view('user.profileUser', compact(['genre', 'userProfile']));
    }

    public function update_profileMember( Request $request, $user_id )
    {
        $name = $request->input('name');
        $no_hp = $request->input('no_hp');
        $alamat = $request->input('alamat');

        DB::table('users')
        ->where('id', $user_id)
        ->update([
            'name' => $name,
            'no_hp' => $no_hp,
            'alamat' => $alamat,
        ]);

        return redirect()->back();
    }

    public function update_roleMember( Request $request, $id )
    {
        $role_member = $request->input('role');
        DB::table('users')
        ->where('id', $id)
        ->update([
            'role' => $role_member,
        ]);
        return redirect()->back();
    }

    public function bann_member( $id )
    {
        $banned_member = User::find($id);
        $banned_member->delete();
        return redirect()->back()->with('bannedMember', 'Member berhasil di banned 🤯');
    }
}
