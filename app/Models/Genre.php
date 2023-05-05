<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Genre extends Model
{
    use HasFactory;
    use Sluggable;
    protected $table = "genre";
    protected $fillable = ['nama_genre', 'slug'];

    function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'nama_genre',
            ]
        ];
    }
}
