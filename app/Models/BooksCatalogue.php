<?php

namespace App\Models;

use App\Models\User;
use App\Models\Genre;
use App\Models\Comment;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class BooksCatalogue extends Model
{
    use HasFactory;
    use Sluggable;
    protected $table = 'books_catalogue';
    protected $guarded = [];

    function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'judul',
            ]
        ];
    }

    public function genre(): BelongsToMany
    {
        return $this->belongsToMany(Genre::class, "book_genre", "book_id", "genre_id");
    }

    public function likers(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'book_user_likes', 'book_id', 'user_id')->withTimestamps();
    }

    public function dislikers(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'book_user_dislikes', 'book_id', 'user_id')->withTimestamps();
    }

    public function scopeFilter($query, array $filters)
    {
        $query->when($filters["search"] ?? false, function( $query, $search ) {
            return $query->where('judul', 'like', '%'. $search . '%')
            ->orWhere('isi_buku', 'like', '%' . $search . '%')
            ->orWhere('sinopsis', 'like', '%'. $search . '%');
        });
        return $query;
    }
}
