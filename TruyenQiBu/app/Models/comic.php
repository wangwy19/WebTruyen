<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class comic extends Model
{
    use HasFactory;

    protected $table = "comics";

    public function author()
    {
        return $this->belongsTo(author::class);
    }

    public function status_comic()
    {
        return $this->belongsTo(status_comic::class);
    }
    public function chapters()
    {
        return $this->hasMany(chapter::class);
    }
    public function genres()
    {
        return $this->belongsToMany(genre::class, 'genres_comics', 'comic_id', 'genre_id');
    }
    public function favorites()
    {
        return $this->hasMany(favorite::class);
    }
    public function comments()
    {
        return $this->hasMany(comment::class)->with(['user', 'chapter']);
    }
}
