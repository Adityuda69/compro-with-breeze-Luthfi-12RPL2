<section>
    @if ($articles->isEmpty())
        <p class="rounded-lg bg-gray-100 p-6 text-center text-gray-600">Belum ada artikel terbaru.</p>
    @else
        <div class="grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-3">
            @foreach ($articles as $article)
                <article class="overflow-hidden rounded-lg border border-gray-200 bg-white shadow-sm">
                    @if ($article->image)
                        <img src="{{ asset('storage/' . $article->image) }}" alt="{{ $article->title }}" class="h-48 w-full object-cover">
                    @else
                        <div class="flex h-48 items-center justify-center bg-gray-100 text-gray-500">No Image</div>
                    @endif
                    <div class="p-5">
                        <p class="mb-2 text-sm text-gray-500">{{ ($article->published_at ?? $article->created_at)?->format('d M Y') }}</p>
                        <h3 class="mb-2 text-lg font-semibold text-gray-900">{{ $article->title }}</h3>
                        <p class="mb-4 text-sm leading-6 text-gray-600">{{ Str::limit(strip_tags($article->excerpt ?: $article->content ?: ''), 150) }}</p>
                        <a href="{{ route('article.show', $article) }}" class="font-semibold text-blue-700 hover:text-blue-800">Baca Selengkapnya</a>
                    </div>
                </article>
            @endforeach
        </div>
    @endif
    <div class="mt-6 text-center">
        <a href="{{ route('article.index') }}" class="font-semibold text-blue-700 hover:text-blue-800">Lihat Semua</a>
    </div>
</section>
