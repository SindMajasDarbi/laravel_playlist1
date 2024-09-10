<x-app-layout>
    <div class="container mx-auto max-w-lg mt-10">
        <h1 class="text-2xl font-bold mb-6 text-center">Songs List</h1>

        <!-- Button to add a new song -->
        <div class="mb-4 text-right">
            <a href="{{ route('song.create') }}" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">
                Add New Song
            </a>
        </div>

        <!-- Table to display the list of songs -->
        <table class="w-full bg-white shadow-md rounded-lg">
            <thead>
                <tr>
                    <th class="py-2">Title</th>
                    <th class="py-2">Artist</th>
                    <th class="py-2">Genre</th>
                    <th class="py-2">Playlist</th>
                    <th class="py-2">Actions</th>
                </tr>
            </thead>
            <tbody>
                <!-- Loop through the songs and display each one in a table row -->
                @foreach($songs as $song)
                    <tr>
                        <td class="py-2 px-4">{{ $song->title }}</td>
                        <td class="py-2 px-4">{{ $song->artist }}</td>
                        <td class="py-2 px-4">{{ $song->genre }}</td>
                        <td class="py-2 px-4">{{ $song->playlist->name }}</td>
                        <td class="py-2 px-4">
                            <!-- Link to edit song -->
                            <a href="{{ route('song.edit', $song->id) }}" class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-2 px-4 rounded mr-2">Edit</a>
                            
                            <!-- Form to delete song -->
                            <form action="{{ route('song.destroy', $song->id) }}" method="POST" class="inline-block">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">Delete</button>
            
