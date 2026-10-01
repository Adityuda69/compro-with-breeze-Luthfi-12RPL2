<x-app-layout>
    <section class="p-8">
        <h1 class="text-6xl font-extrabold">Edit Data Product</h1>
        <form action="{{ route('dashboard.products.update', $product) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <p>Title</p>
            <input type="text" name="title" value="{{ old('title', $product->title) }}">

            <p>Description</p>
            <textarea name="description" id="description" cols="80" rows="10">{{ old('description', $product->description) }}</textarea>

            <p>Image (optional)</p>
            @if ($product->image)
                <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->title }}" class="mb-3 h-24 w-24 rounded-lg object-cover">
            @endif
            <input type="file" name="image" accept="image/*">

            <button type="submit" class="bg-blue-500 rounded-lg p-3">UPDATE</button>
            @if ($errors->any())
                <div role="alert" class="bg-red-300 text-gray-700 p-2">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
        </form>
    </section>
</x-app-layout>
