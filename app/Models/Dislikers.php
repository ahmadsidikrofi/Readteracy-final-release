<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dislikers extends Model
{
    use HasFactory;
    protected $table = 'book_user_dislikes';
    protected $guarded = [];
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
