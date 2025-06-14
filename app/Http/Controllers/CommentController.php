<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(Request $request, Book $book)
{
    $request->validate([
        'content' => 'required|string|max:1000',
    ]);

    $book->comments()->create([
        'user_id' => auth()->id(),
        'content' => $request->content,
    ]);

    return back()->with('success', __('messages.comment_added'));
}

}
