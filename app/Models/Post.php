<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\User;
use App\Models\Like;


class Post extends Model
{
    use HasFactory;

    protected $table = 'posts'; 
    protected $guarded = [];


    // Define relationships, for example, with the User model
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
    public function likes()
{
    return $this->hasMany(Like::class);
}


    // Define relationships with comments (assuming a post has many comments)
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
    public function likedByUsers()
    {
        return $this->belongsToMany(User::class, 'likes');
    }
    
    
    public function scopeMostPopular($query)
    {
        return $query->withCount('likes')
            ->orderBy('likes_count', 'desc')->limit(5);
    }
}

