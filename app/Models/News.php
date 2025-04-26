<?php

namespace App\Models;

use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class News extends Model
{
    /** @use HasFactory<\Database\Factories\NewsFactory> */
    use HasFactory;

    protected $guarded = [
        'id'
    ];

    public function Category()
    {
        return $this->belongsTo(Category::class);
    }

    protected static function booted()
    {
        static::creating(function ($news) {
            $news->slug = static::generateUniqueSlug($news->title);
            $news->user_id = User::inRandomOrder()->value('id');
        });

        static::updating(function ($news) {
            $news->slug = static::generateUniqueSlug($news->title, $news->id);
            $news->user_id = User::inRandomOrder()->value('id');
        });
    }

    protected static function generateUniqueSlug($title, $id = null)
    {
        $slug = Str::slug($title);
        $originalSlug = $slug;
        $counter = 1;

        while (static::where('slug', $slug)
            ->when($id, fn($query) => $query->where('id', '!=', $id))
            ->exists()
        ) {
            $slug = $originalSlug . '-' . $counter++;
        }

        return $slug;
    }
}
