<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class PeminjamanBuku extends Model
{
    use HasFactory;
    protected $table = 'peminjaman_buku';
    protected $guarded = ["actual_return_date"];

    public function genre(): BelongsToMany
    {
        return $this->belongsToMany(Genre::class, "book_genre", "book_id", "genre_id");
    }

    public function book()
    {
        return $this->belongsTo(BooksCatalogue::class);
    }
}
