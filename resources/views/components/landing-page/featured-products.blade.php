<section class="border-8 border-blue-600 p-4 sm:p-6">
    @if ($products->isEmpty())
        <p class="rounded-lg bg-gray-100 p-6 text-center text-gray-600">Belum ada layanan unggulan yang tersedia.</p>
    @else
        <div class="grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-3">
            @foreach ($products as $product)
                <article class="overflow-hidden rounded-lg border border-gray-200 bg-white shadow-sm">
                    @if ($product->image)
                        <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->title }}" class="h-48 w-full object-cover">
                    @else
                        <div class="flex h-48 items-center justify-center bg-gray-100 text-gray-500">No Image</div>
                    @endif
                    <div class="p-5">
                        <h3 class="mb-2 text-lg font-semibold text-gray-900">{{ $product->title }}</h3>
                        <p class="mb-4 text-sm leading-6 text-gray-600">{{ Str::limit(strip_tags($product->description ?? ''), 140) }}</p>
                        <a href="{{ route('product.show', $product) }}" class="inline-block rounded-md bg-blue-700 px-4 py-2 text-sm font-semibold text-white hover:bg-blue-800">Detail</a>
                    </div>
                </article>
            @endforeach
        </div>
    @endif
    <div class="mt-6 text-center">
        <a href="{{ route('product.index') }}" class="font-semibold text-blue-700 hover:text-blue-800">Lihat Semua</a>
    </div>
</section>
