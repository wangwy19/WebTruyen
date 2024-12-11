<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class user extends Model
{
    use HasFactory;

    protected $fillable = [
        'fullname',
        'username',
        'password',
        'email',
        'role_id',
        'read',
        'avatar'
    ];
}