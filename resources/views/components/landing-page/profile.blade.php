<section class="mx-auto w-full max-w-4xl border-2 border-blue-500 px-4 py-6 text-center sm:px-8">
    @if (filled($companyProfile?->sejarah))
        <p class="text-base leading-7 text-gray-700">{{ Str::limit(strip_tags($companyProfile->sejarah), 300) }}</p>
    @else
        <p class="text-base leading-7 text-gray-700">Belum tersedia.</p>
    @endif
    <a href="{{ route('companyprofile') }}" class="mt-4 inline-block font-semibold text-blue-700 hover:text-blue-800">Selengkapnya</a>
</section>
