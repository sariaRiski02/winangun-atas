<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StructureProfile extends Model
{
    /** @use HasFactory<\Database\Factories\StructureProfileFactory> */
    use HasFactory;

    protected $guarded = [
        'id'
    ];
}
