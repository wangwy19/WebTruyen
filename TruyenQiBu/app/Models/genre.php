<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class genre extends Model
{
    use HasFactory;

    protected $table = "genres";

    protected $fillable = ['name', 'description'];

    public function comics()
    {
        return $this->belongsToMany(comic::class, 'genres_comics', 'genre_id', 'comic_id');
    }
}
