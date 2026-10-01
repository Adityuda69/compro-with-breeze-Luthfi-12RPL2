@extends('layouts.public')

@section('title', $article->title)

@section('content')
    <!-- Main Article Content -->
    <div class="max-w-4xl mx-auto">
        <article class="bg-white rounded-lg shadow-lg p-6 md:p-10">
            <h1 class="text-3xl md:text-4xl font-extrabold text-gray-900 mb-4">{{ $article->title }}</h1>

            <p class="text-sm text-gray-500 mb-6">Dipublikasikan pada {{ $article->created_at->format('d M Y') }}</p>

            @if($article->image)
                <img src="{{ asset('storage/' . $article->image) }}" alt="{{ $article->title }}" class="w-full max-h-96 object-cover rounded-lg mb-8">
            @endif

            <div class="prose max-w-none text-gray-800 leading-relaxed space-y-4">
                {!! nl2br(e($article->content)) !!}
            </div>
        </article>
    </div>
@endsection
