<?php

use App\Models\PeminjamanBuku;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\GenreController;
use App\Http\Controllers\CatalogueController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\NavbarController;
use App\Http\Controllers\PeminjamanBukuController;
use App\Http\Controllers\UsersController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [NavbarController::class, "all_genre_navbarGuest"])->middleware('guest');
// Route::get('/', function () {
//     return view('homeGuest');
// });

Route::get('/Readteracy/home', [NavbarController::class, "all_genre_navbarAuth"]);
Route::get('/notification', [NavbarController::class, "notification"]);

Route::get('/Readteracy/403', function () {
    return view('forbidden.403');
});

// Auth
Route::get('/account/register', [AuthController::class, "register_page"]);
Route::post('/account/register/store', [AuthController::class, "register_store"]);
Route::get('/account/login-page', [AuthController::class, "login_page"]);
Route::post('/account/login/store', [AuthController::class, "login_store"]);
Route::get('/account/auth/logout', [AuthController::class, "logout"]);

// Profile
Route::get('/Readteracy/profile', [AuthController::class, "profile_page"]);
Route::put('/Readteracy/account/update', [AuthController::class, "update_profile"]);
Route::post('/Readteracy/account/{id}/profile-picture', [AuthController::class, "update_profilePic"]);
Route::get('/Readteracy/account/{id}/delete/profile-picture', [AuthController::class, "delete_profilePic"]);
// Profile Petugas Genre
Route::get('/Readteracy/genre/genreList', [GenreController::class, "genreList"]);
Route::get('/Readteracy/addGenre/page', [GenreController::class, "addGenre_page"]);
Route::post('/Readteracy/addGenre/store', [GenreController::class, "addGenre_store"]);
Route::get('/Readteracy/editGenre/{slug}', [GenreController::class, "editGenre_page"]);
Route::put('/Readteracy/editGenre/{slug}/store', [GenreController::class, "editGenre_store"]);
Route::get('/Readteracy/delete/{slug}/genre', [GenreController::class, "delete_genre"]);
// Profile Admin all users
Route::get('/Readteracy/admin/all-users', [UsersController::class, "listUser_page"]);
Route::get('/Readteracy/see-profile/{id}', [UsersController::class, "profileUser_page"]);
Route::put('/Readteracy/admin/update/member/{id}', [UsersController::class, "update_profileMember"]);
Route::put('/Readteracy/admin/update-role/{id}', [UsersController::class, "update_roleMember"]);
Route::get('/Readteracy/delete/{id}/user', [UsersController::class, "bann_member"]);

Route::get('Readteracy/account/updateProfile', [AuthController::class, "update_profilePic2"])->name('updateProfilePicture');


// Catalogue
Route::get('/Readteracy/catalogue', [CatalogueController::class, "catalogue_page"]);
Route::get('/Readteracy/detail/guest/{id}', [CatalogueController::class, "detailBook_page_guest"]);
Route::get('/Readteracy/detail/{id}', [CatalogueController::class, "detailBook_page_userAuth"]);
Route::get('/Readteracy/baca-buku/{id}', [CatalogueController::class, "baca_buku"]);
Route::get('/get-next-page/{id}', [CatalogueController::class, "getNextPage"])->name('books.getNextPage');
Route::middleware('what_role')->group(function() {
    Route::get('/Readteracy/catalogue/addBook', [CatalogueController::class, "addBook_page"]);
    Route::post('/Readteracy/catalogue/addBook/store', [CatalogueController::class, "addBook_store"]);
    Route::get('/Readteracy/editBook/{slug}', [CatalogueController::class, "editBook_page"]);
    Route::put('/Readteracy/catalogue/editBook/{slug}/store', [CatalogueController::class, "editBook_store"]);
    Route::get('/Readteracy/delete-book/{slug}', [CatalogueController::class, "destroy"]);
});
// Route ini adalah ketika setelah mengembalikan buku
Route::get('/Readteracy/detail/buku/{id}', [CatalogueController::class, "detailBook_page_userAuth"]);

// Like-Dislike Book
Route::post('/Readteracy/like-dislike-book/{id}', [LikeController::class, "like_dislike"]);

// Peminjaman Buku / history/libary
Route::get('/Readteracy/history/borrowed', [PeminjamanBukuController::class, "viewPage_historyPeminjaman"]);
Route::post('/Readteracy/borrow/{id}/non-fisik', [PeminjamanBukuController::class, "pinjam_buku_nonFisik"]);
Route::post('/Readteracy/borrow/{id}/fisik', [PeminjamanBukuController::class, "pinjam_buku_fisik"])->name("pinjamBukuFisik");
Route::post('/Readteracy/return-book', [PeminjamanBukuController::class, "return_book"]);


// Data Buku (Petugas buku)
Route::get('/Readteracy/data-peminjaman', [PeminjamanBukuController::class, "viewPage_dataPeminjaman"])->middleware('what_role');
Route::put('/Readteracy/{id}/ubah-status/data-peminjaman', [PeminjamanBukuController::class, "ubah_status"]);


Route::get('/Readteracy/about-us', [NavbarController::class, "viewPage_about"]);
