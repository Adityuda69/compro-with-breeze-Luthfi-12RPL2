@extends('layouts.public')

@section('title', 'Products')

@section('content')
    <section>
        <h1 class="mb-8 text-3xl font-bold text-gray-900">Products</h1>

        @if ($products->isEmpty())
            <p class="rounded-lg bg-gray-100 p-6 text-center text-gray-600">Belum ada produk yang tersedia.</p>
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
                            <h2 class="mb-2 text-xl font-semibold text-gray-900">{{ $product->title }}</h2>
                            <p class="mb-4 text-sm leading-6 text-gray-600">{{ Str::limit($product->description, 140) }}</p>
                            <a href="{{ route('product.show', $product) }}" class="inline-block rounded-md bg-blue-700 px-4 py-2 text-sm font-semibold text-white hover:bg-blue-800">Detail</a>
                        </div>
                    </article>
                @endforeach
            </div>
        @endif
    </section>
@endsection
