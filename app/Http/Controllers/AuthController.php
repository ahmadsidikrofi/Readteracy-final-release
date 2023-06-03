<?php

namespace App\Http\Controllers;

use App\Models\Auth;
use App\Models\BooksCatalogue;
use App\Models\User;
use App\Models\Genre;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\PeminjamanBuku;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Auth as AuthLogin;

class AuthController extends Controller
{
    public function register_page()
    {
        return view('auth.register');
    }

    public function register_store(Request $request)
    {
        $this->validate($request, [
            'password' => 'required|confirmed|min:5',
            'name' => 'required'
        ], [
            'name.required' => "Field nama wajib di isi."
        ]);

        $checkEmail = Auth::where('email', $request->email)->first();
        if ( $checkEmail ) {
            return redirect()->back()->with('error', 'email sudah terdaftar');
        }

        Auth::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'remember_token' => Str::random(60)
        ]);
        return redirect('/')->with('successRegist', 'Akunmu berhasil didaftarkan 😍');
    }

    public function login_page()
    {
        return view('auth.login');
    }

    public function login_store( Request $request )
    {
        if ( AuthLogin::attempt(['email' => $request->email, 'password' => $request->password]) ) {

            $time = 360;
            $response = new Response(redirect('/Readteracy/home')->with('berhasilLogin', 'Selamat Datang Di Readteracy'));
            if ( $request->has('remember') ) {
                $response->withCookie(Cookie("RPL06-Readteracy", "Readteracy", $time));
                return $response;
            }
            else {
                return redirect('/Readteracy/home')->with('berhasilLogin', 'Selamat Datang Di Readteracy');
            }

        } else {
            return redirect('/account/login-page')->with('wrongAuth', 'Email dan Password tidak sesuai');
        }
    }

    public function logout()
    {
        AuthLogin::logout();
        return redirect('/')->with('logingOut', 'Terimakasih telah membaca, jangan bosan kemari lagi yah 😘');
    }

    public function profile_page()
    {
        $genre = Genre::all();
        $user = auth()->user();
        $peminjaman = PeminjamanBuku::where('user_id', '=', $user->id)->latest()->take(2)->get();
        // $peminjaman = PeminjamanBuku::with('genreHistorical')->where('user_id', '=', $user->id)->latest()->get();

        $allBooks = BooksCatalogue::count();
        $allGenres = Genre::count();
        $count_users = Auth::count();
        $count_peminjaman = PeminjamanBuku::count();
        $count_pengembalian = PeminjamanBuku::where('status', '=', 'dikembalikan')->count();
        return view('auth.profile', compact([
            'peminjaman', 'count_users', 'genre',
            'allGenres', 'allBooks', 'count_peminjaman', 'count_pengembalian'
        ]));
    }

    public function update_profile( Request $request )
    {
        // $users = AuthLogin::user();
        // $users->name = $request->name;
        // $users->no_hp = $request->no_hp;
        // $users->alamat = $request->alamat;
        // $users->save();

        $name = $request->input('name');
        $no_hp = $request->input('no_hp');
        $alamat = $request->input('alamat');
        DB::table('users')
        ->where('id', '=', AuthLogin::user()->id)
        ->update([
            'name' => $name,
            'no_hp' => $no_hp,
            'alamat' => $alamat,
        ]);
        return redirect('/Readteracy/profile')->with('updateProfile', "Profilemu berhasil di update");
    }

    public function update_profilePic(Request $request, $id)
    {
        $this->validate($request, [
            'image' => 'required|mimes:jpg,jpeg,png,jfif',
        ]);

        $profile = Auth::find($id);
        $profile -> update($request->except("_token", "updatePic"));

        // if ( $request -> hasFile("image") ) {
        //     $request -> file("image")->move("img/profile/", $request->file("image")->getClientOriginalName());
        //     $profile -> image = $request -> file("image")->getClientOriginalName();
        //     $profile -> save();
        // }

        if ($request->hasFile("image")) {
            $image = $request->file("image");
            $fileName = $image->getClientOriginalName();
            $image = Image::make($image)->resize(479, 340);
            $image->save("img/profile/".$fileName);
            $profile->image = $fileName;
            $profile->save();
        }

        return redirect("/Readteracy/profile")->with('profileUpdate', 'Profile Kamu Sukses Di Update');
    }

    public function delete_profilePic($id)
    {
        $user = Auth::find($id);
        $img_path = public_path().'/img/profile/'.$user->image;

        if (File::exists($img_path)) {
            File::delete($img_path);

            $user->update([
                'image' => null,
                ]);
        }

        return redirect("/Readteracy/profile")->with('profileUpdate', 'Profile Kamu Sukses Di Update');
    }


    public function update_profilePic2(Request $request)
    {
        $path = 'img/profile/';
        $file = $request->file('image2');
        $new_name = 'UIMG_'.date('Ymd').uniqid().'.png';

        //Upload new image
        $upload = $file->move(public_path($path), $new_name);

        if( !$upload ){
            return response()->json(['status'=>0,'msg'=>'Something went wrong, upload new picture failed.']);
        }else{
            //Get Old picture
            $oldPicture = User::find(Auth::user()->id)->getAttributes()['picture'];

            if( $oldPicture != NULL ){
                if( File::exists(public_path($path.$oldPicture))){
                    File::delete(public_path($path.$oldPicture));
                }
            }

            //Update DB
            $update = User::find(Auth::user()->id)->update(['picture'=>$new_name]);

            if( !$upload ){
                return response()->json(['status'=>0,'msg'=>'Something went wrong, updating picture in db failed.']);
            }else{
                return response()->json(['status'=>1,'msg'=>'Your profile picture has been updated successfully']);
            }
        }
    }
}
