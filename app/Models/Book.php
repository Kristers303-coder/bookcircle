<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $fillable = ['title', 'author', 'description', 'genre_id'];

    public function genre()
    {
        return $this->belongsTo(Genre::class);
    }
    public function comments()
{
    return $this->hasMany(Comment::class);
}
public function ratings()
{
    return $this->hasMany(Rating::class);
}

public function averageRating()
{
    return $this->ratings()->avg('rating');
}

}
