{{-- resources/views/books/_form.blade.php --}}
<div class="mb-4">
    <label for="title" class="block text-sm font-medium text-gray-700">{{ __('messages.title') }}</label>
    <input type="text" name="title" id="title" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" value="{{ old('title', $book->title ?? '') }}">
</div>

<div class="mb-4">
    <label for="author" class="block text-sm font-medium text-gray-700">{{ __('messages.author') }}</label>
    <input type="text" name="author" id="author" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" value="{{ old('author', $book->author ?? '') }}">
</div>

<div class="mb-4">
    <label for="description" class="block text-sm font-medium text-gray-700">{{ __('messages.description') }}</label>
    <textarea name="description" id="description" rows="3" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">{{ old('description', $book->description ?? '') }}</textarea>
</div>

<div class="mb-4">
    <label for="genre_id" class="block text-sm font-medium text-gray-700">{{ __('messages.genre') }}</label>
    <select name="genre_id" id="genre_id" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
        <option value="">--</option>
        @foreach($genres as $genre)
            <option value="{{ $genre->id }}" {{ (old('genre_id', $book->genre_id ?? '') == $genre->id) ? 'selected' : '' }}>
                {{ $genre->name }}
            </option>
        @endforeach
    </select>
</div>

<div>
    <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
        {{ __('messages.save') }}
    </button>
</div>
