<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HomeProfile extends Model
{
    /** @use HasFactory<\Database\Factories\HomeProfileFactory> */
    use HasFactory;

    protected $fillable = [
        'kades_photo',
        'greeting',
        'hero_photo',
    ];
}
