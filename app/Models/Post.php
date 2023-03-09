<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'name',
        'content',
        'featured_image',
        'category_id',
        'count_view',
        'user_id',
        'slug',
        'status',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function getFeaturedAtribute($featured)
    {
        return asset($featured);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }
}
