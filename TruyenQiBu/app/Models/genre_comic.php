<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class genre_comic extends Model
{
    use HasFactory;

    protected $fillable = [
        'comic_id',
        'genre_id'
    ];
}