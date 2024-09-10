<x-app-layout>
    <div class="container mx-auto max-w-lg mt-10 p-6 bg-white shadow-md rounded-lg">
        <h1 class="text-2xl font-bold mb-6 text-center">Edit Song</h1>
        <form action="{{ route('song.update', $song->id) }}" method="POST" class="space-y-4">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="title" class="block text-sm font-medium text-gray-700">Title</label>
                <input value="{{ $song->title }}" type="text" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md" id="title" name="title" required>
            </div>
            <div class="form-group">
                <label for="artist" class="block text-sm font-medium text-gray-700">Artist</label>
                <input value="{{ $song->artist }}" type="text" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md" id="artist" name="artist" required>
            </div>
            <div class="form-group">
                <label for="genre" class="block text-sm font-medium text-gray-700">Genre</label>
                <input value="{{ $song->genre }}" type="text" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md" id="genre" name="genre" required>
            </div>
            <div class="form-group">
                <label for="playlist_id" class="block text-sm font-medium text-gray-700">Select Playlist</label>
                <select class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md" id="playlist_id" name="playlist_id" required>
                    @foreach($playlists as $playlist)
                        <option value="{{ $playlist->id }}" {{ $playlist->id == $song->playlist_id ? 'selected' : '' }}>
                            {{ $playlist->name }}
                        </option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="w-full bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                Update Song
            </button>
        </form>
    </div>
</x-app-layout>
