@extends('layouts.app')

@section('content')
    <h1>Rediģēt grāmatu</h1>
    @include('books._form', ['book' => $book, 'action' => route('books.update', $book), 'method' => 'PUT'])
@endsection
