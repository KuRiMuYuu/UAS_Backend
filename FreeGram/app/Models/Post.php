<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'caption',
        'media_path',
        'media_type',
    ];

    // Relationship: Post belongs to a user
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Relationship: Post has many likes
    public function likes()
    {
        return $this->hasMany(Like::class);
    }

    // Relationship:  post Belong has many coment
    public function comments()
    {
    return $this->hasMany(Comment::class);
    }

}
