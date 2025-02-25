<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class chapter extends Model
{
    use HasFactory;

    protected $table = 'chapters';

    public function comic()
    {
        return $this->belongsTo(comic::class);
    }

    public function images()
    {
        return $this->hasMany(image::class);
    }
}
