<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class comic extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'author_id',
        'status_comic_id',
        'view',
        'description'
    ];
}