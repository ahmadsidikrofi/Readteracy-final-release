<?php

namespace App\Models;

use App\Models\Genre;
use App\Models\Comment;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class PeminjamanBuku extends Model
{
    use HasFactory;
    use Sluggable;
    protected $table = 'peminjaman_buku';
    protected $guarded = ["actual_return_date"];

    function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'judul',
            ]
        ];
    }

    public function genrePeminjaman(): BelongsToMany
    {
        return $this->belongsToMany(Genre::class, "book_genre", "book_id", "genre_id");
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class,'book_id');
    }
}
