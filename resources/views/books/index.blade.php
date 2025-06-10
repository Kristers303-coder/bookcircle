@extends('layouts.app')

@section('content')
    <h1>Grāmatu saraksts</h1>
    <a href="{{ route('books.create') }}">➕ Pievienot grāmatu</a>

    @if(session('success'))
        <p style="color: green;">{{ session('success') }}</p>
    @endif

    <ul>
        @foreach($books as $book)
            <li>
                <strong>{{ $book->title }}</strong> — {{ $book->author }}
                (Žanrs: {{ $book->genre->name ?? 'Nav' }})
                <a href="{{ route('books.show', $book) }}">Skatīt</a> |
                <a href="{{ route('books.edit', $book) }}">Rediģēt</a> |
                <form action="{{ route('books.destroy', $book) }}" method="POST" style="display:inline;">
                    @csrf @method('DELETE')
                    <button type="submit" onclick="return confirm('Vai tiešām dzēst?')">Dzēst</button>
                </form>
            </li>
        @endforeach
    </ul>
@endsection
