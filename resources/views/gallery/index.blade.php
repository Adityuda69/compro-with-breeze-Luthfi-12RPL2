<x-app-layout>
    <section class="p-8">
        <a href="{{ route('dashboard.galleries.create') }}" class="mb-6 inline-block rounded bg-blue-600 px-4 py-3 font-semibold text-white hover:bg-blue-700">+ Add Gallery Photo</a>

        @if ($data->isEmpty())
            <p class="rounded bg-gray-100 p-6 text-center text-gray-600">Belum ada foto galeri.</p>
        @else
            <div class="grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-3">
                @foreach ($data as $gallery)
                    <article class="overflow-hidden rounded-lg border border-gray-200 bg-white shadow-sm">
                        <img src="{{ asset('storage/' . $gallery->photo) }}" alt="{{ $gallery->title }}" class="h-48 w-full object-cover">
                        <div class="flex items-center justify-between gap-3 p-4">
                            <h2 class="font-semibold text-gray-900">{{ $gallery->title }}</h2>
                            <div class="flex items-center gap-3">
                                <a href="{{ route('dashboard.galleries.edit', $gallery) }}" class="font-medium text-blue-700 hover:underline">Edit</a>
                                <form action="{{ route('dashboard.galleries.destroy', $gallery) }}" method="POST" onsubmit="return confirm('Hapus foto ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="font-medium text-red-700 hover:underline">Delete</button>
                                </form>
                            </div>
                        </div>
                    </article>
                @endforeach
            </div>
        @endif
    </section>
</x-app-layout>
