<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PeminjamanBuku extends Model
{
    use HasFactory;
    protected $table = 'peminjaman_buku';
    protected $guarded = ["actual_return_date"];

    // public function genreHistorical()
    // {
    //     return $this->belongsTo(genreHistorical::class);
    // }
    // public function genreEducation()
    // {
    //     return $this->belongsTo(genreEducation::class);
    // }

    // public function borrower()
    // {
    //     return $this->belongsTo(User::class, 'borrower_id');
    // }
}
