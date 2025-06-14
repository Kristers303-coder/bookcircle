{{-- resources/views/books/index.blade.php --}}
@extends('layouts.app')

@section('content')
    <div class="max-w-4xl mx-auto bg-white p-6 rounded shadow">
        <h1 class="text-2xl font-bold mb-4">{{ __('messages.book_list') }}</h1>

        @if(session('success'))
            <div class="mb-4 text-green-600">{{ session('success') }}</div>
        @endif

        <div class="space-y-4">
            @foreach($books as $book)
                <div class="border p-4 rounded shadow-sm">
                    <h2 class="text-xl font-semibold">{{ $book->title }}</h2>
                    <p><strong>{{ __('messages.author') }}:</strong> {{ $book->author }}</p>
                    <p><strong>{{ __('messages.genre') }}:</strong> {{ $book->genre->name ?? __('messages.no_genre') }}</p>
                    <div class="mt-2 space-x-2">
                        <a href="{{ route('books.show', $book) }}" class="text-blue-600 hover:underline">{{ __('messages.show') }}</a>

                        @auth
                            @if(Auth::user()->isAdmin())
                                <a href="{{ route('books.edit', $book) }}" class="text-yellow-600 hover:underline">{{ __('messages.edit') }}</a>
                                <form action="{{ route('books.destroy', $book) }}" method="POST" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" onclick="return confirm('{{ __('messages.confirm_delete') }}')" class="text-red-600 hover:underline">
                                        {{ __('messages.delete') }}
                                    </button>
                                </form>
                            @elseif(Auth::user()->role === 'moderator')
                                <span class="text-gray-500">({{ __('messages.moderator') }})</span>
                            @endif
                        @endauth
                    </div>
                </div>
            @endforeach
        </div>

        <div class="mt-6">
            <a href="{{ route('books.create') }}" class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600">{{ __('messages.add_book') }}</a>
        </div>
    </div>
@endsection