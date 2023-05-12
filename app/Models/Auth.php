<?php

namespace App\Models;

use App\Models\Comment;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Auth extends Model
{
    use HasFactory;
    protected $table = "users";
    protected $guarded = [];
}
