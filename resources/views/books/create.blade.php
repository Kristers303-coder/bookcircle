@extends('layouts.app')

@section('content')
    <h1>Pievienot grāmatu</h1>
    @include('books._form', [
        'book' => new \App\Models\Book,
        'action' => route('books.store'),
        'method' => 'POST',
        'genres' => $genres
    ])
@endsection
