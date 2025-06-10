@extends('layouts.app')

@section('content')
    <h1>{{ $book->title }}</h1>
    <p><strong>Autors:</strong> {{ $book->author }}</p>
    <p><strong>Apraksts:</strong> {{ $book->description }}</p>
    <p><strong>Žanrs:</strong> {{ $book->genre->name ?? 'Nav norādīts' }}</p>

    <a href="{{ route('books.index') }}">⬅️ Atpakaļ</a>
@endsection
