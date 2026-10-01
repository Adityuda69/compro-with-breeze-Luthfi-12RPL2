@extends('layouts.public')

@section('title', 'Articles')

@section('content')
    <!-- Main Content -->
    <div class="max-w-7xl mx-auto px-4 py-8">
        <h1 class="text-3xl font-bold text-gray-900 mb-6">Artikel Terbaru</h1>

        @if($data->isEmpty())
            <div class="bg-white p-6 rounded-lg shadow text-center text-gray-500">
                Belum ada artikel yang dipublikasikan.
            </div>
        @else
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach($data as $item)
                    <div class="bg-white rounded-lg shadow-md overflow-hidden flex flex-col justify-between">
                        <div>
                            @if($item->image)
                                <img src="{{ asset('storage/' . $item->image) }}" alt="{{ $item->title }}" class="w-full h-48 object-cover">
                            @else
                                <div class="w-full h-48 bg-gray-200 flex items-center justify-center text-gray-400">No Image</div>
                            @endif

                            <div class="p-5">
                                <h2 class="text-xl font-bold text-gray-800 mb-2 line-clamp-2">{{ $item->title }}</h2>
                                <p class="text-gray-600 text-sm line-clamp-3">{{ $item->content }}</p>
                            </div>
                        </div>

                        <div class="p-5 pt-0">
                            <a href="{{ route('article.show', $item->id) }}" class="inline-block bg-blue-600 hover:bg-blue-700 text-white font-medium text-sm px-4 py-2 rounded">
                                Baca Selengkapnya
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>

@endsection
