<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class reply extends Model
{
    use HasFactory;

    protected $fillable = [
        'content',
        'comment_id',
        'user_id',
        'comic_id',
        'chapter_id'
    ];
}