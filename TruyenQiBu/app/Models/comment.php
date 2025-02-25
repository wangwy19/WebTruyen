<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class comment extends Model
{
    use HasFactory;

    protected $table = 'comments';

    public function user()
    {
        return $this->belongsTo(user::class);
    }
    public function chapter()
    {
        return $this->belongsTo(chapter::class);
    }
}
