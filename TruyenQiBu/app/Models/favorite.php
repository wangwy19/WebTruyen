<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class favorite extends Model
{
    use HasFactory;

    protected $table = "favorites";

    public function comic()
    {
        return $this->belongsTo(comic::class)->with(['chapters' => function ($query) {
            $query->orderBy('created_at', "desc");
        }, 'favorites']);
    }
}
