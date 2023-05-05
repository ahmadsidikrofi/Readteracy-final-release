<?php

namespace App\Models;

use App\Models\Genre;
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
}
