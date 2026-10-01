@extends('layouts.public')

@section('title', $product->title)

@section('content')
    <article class="mx-auto max-w-4xl">
        <a href="{{ route('product.index') }}" class="mb-6 inline-block text-sm font-medium text-blue-700 hover:text-blue-800">&larr; Back to Products</a>

        <div class="overflow-hidden rounded-lg border border-gray-200 bg-white">
            @if ($product->image)
                <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->title }}" class="max-h-96 w-full object-cover">
            @else
                <div class="flex h-64 items-center justify-center bg-gray-100 text-gray-500">No Image</div>
            @endif

            <div class="p-6 md:p-8">
                <h1 class="mb-4 text-3xl font-bold text-gray-900">{{ $product->title }}</h1>
                <p class="whitespace-pre-line leading-7 text-gray-700">{{ $product->description }}</p>
            </div>
        </div>
    </article>
@endsection
