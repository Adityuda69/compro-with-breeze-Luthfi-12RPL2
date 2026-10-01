<section>
    @if ($galleries->isEmpty())
        <p class="rounded-lg bg-gray-100 p-6 text-center text-gray-600">Belum ada foto galeri yang tersedia.</p>
    @else
        <div class="grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-4">
            @foreach ($galleries as $gallery)
                <figure class="overflow-hidden rounded-lg border border-gray-200 bg-white shadow-sm">
                    <img src="{{ asset('storage/' . $gallery->photo) }}" alt="{{ $gallery->title }}" class="h-48 w-full object-cover">
                    <figcaption class="p-4 font-medium text-gray-900">{{ $gallery->title }}</figcaption>
                </figure>
            @endforeach
        </div>
    @endif
    <div class="mt-6 text-center">
        <a href="{{ route('gallery.index') }}" class="font-semibold text-blue-700 hover:text-blue-800">Lihat Semua</a>
    </div>
</section>
