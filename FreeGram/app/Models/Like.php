<?php

// app/Models/Like.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'post_id', // Pastikan kolom 'post_id' juga ada di sini jika belum ada
        // tambahkan kolom lain yang perlu diisi secara massal jika ada
    ];

    // Relationship: Like belongs to a post
    public function post()
    {
        return $this->belongsTo(Post::class);
    }

    // Relationship: Like belongs to a user
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
