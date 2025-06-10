<form action="{{ $action }}" method="POST">
    @csrf
    @if($method === 'PUT')
        @method('PUT')
    @endif

    <label>Nosaukums:</label><br>
    <input type="text" name="title" value="{{ old('title', $book->title) }}"><br>

    <label>Autors:</label><br>
    <input type="text" name="author" value="{{ old('author', $book->author) }}"><br>

    <label>Apraksts:</label><br>
    <textarea name="description">{{ old('description', $book->description) }}</textarea><br>

    <label>Žanrs:</label><br>
    <select name="genre_id">
        @foreach($genres as $genre)
            <option value="{{ $genre->id }}" {{ $genre->id == old('genre_id', $book->genre_id) ? 'selected' : '' }}>
                {{ $genre->name }}
            </option>
        @endforeach
    </select>


    <button type="submit">Saglabāt</button>
</form>
