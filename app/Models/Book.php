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
}
