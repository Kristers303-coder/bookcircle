<?php

namespace App\Http\Controllers;

use App\Models\Rating;
use App\Models\Book;
use Illuminate\Http\Request;

class RatingController extends Controller
{
    public function store(Request $request, Book $book)
    {
        $request->validate([
            'rating' => 'required|integer|min:1|max:5',
        ]);

        $book->ratings()->updateOrCreate(
            ['user_id' => auth()->id()],
            ['rating' => $request->rating]
        );

        return back()->with('success', 'Reitings saglabāts!');
    }
}
