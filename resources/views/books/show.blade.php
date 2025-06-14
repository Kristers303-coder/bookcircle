{{-- resources/views/books/show.blade.php --}}
@extends('layouts.app')

@section('content')
    <div class="max-w-2xl mx-auto bg-white p-6 rounded shadow">
        <h1 class="text-2xl font-bold mb-4">{{ $book->title }}</h1>

        <p><strong>{{ __('messages.author') }}:</strong> {{ $book->author }}</p>
        <p><strong>{{ __('messages.genre') }}:</strong> {{ $book->genre->name ?? __('messages.no_genre') }}</p>

        {{-- Reitings --}}
        @if($book->ratings->count())
            <p class="mt-4"><strong>{{ __('messages.average_rating') }}:</strong> {{ number_format($book->ratings->avg('rating'), 1) }} / 5</p>
        @endif

        @auth
            <form action="{{ route('ratings.store', $book) }}" method="POST" class="mt-4">
                @csrf
                <label for="rating">{{ __('messages.rate_this_book') }}:</label>
                <select name="rating" id="rating" class="ml-2 border rounded px-2 py-1">
                    @for($i = 1; $i <= 5; $i++)
                        <option value="{{ $i }}" {{ optional($book->ratings->where('user_id', auth()->id())->first())->rating == $i ? 'selected' : '' }}>{{ $i }}</option>
                    @endfor
                </select>
                <button type="submit" class="ml-2 bg-blue-500 text-white px-3 py-1 rounded hover:bg-blue-600">{{ __('messages.save') }}</button>
            </form>
        @endauth

{{-- Komentāru sadaļa --}}
<h2 class="text-xl font-semibold mt-6 mb-2">{{ __('messages.comments') }}</h2>

@foreach($book->comments as $comment)
    <div class="border-t py-2">
        <p class="text-sm text-gray-600">{{ $comment->user->name }}:</p>
        <p>{{ $comment->content }}</p>
    </div>
@endforeach

{{-- Komentēšanas forma --}}
@auth
    <form action="{{ route('comments.store', $book) }}" method="POST" class="mt-4">
        @csrf
        <textarea name="content" rows="3" class="w-full border border-gray-300 rounded px-3 py-2" placeholder="{{ __('messages.add_comment') }}"></textarea>
        <button type="submit" class="mt-2 bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
            {{ __('messages.submit_comment') }}
        </button>
    </form>
@endauth

@endsection