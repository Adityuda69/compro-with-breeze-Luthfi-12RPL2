<x-app-layout>
    <section class="p-8">
        <h1 class="mb-6 text-4xl font-extrabold">Add Gallery Photo</h1>
        <form action="{{ route('dashboard.galleries.store') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
            @csrf

            <div>
                <label for="title" class="mb-2 block font-medium text-gray-700">Title</label>
                <input id="title" type="text" name="title" value="{{ old('title') }}" required maxlength="255" class="block w-full rounded-md border-gray-300">
            </div>

            <div>
                <label for="photo" class="mb-2 block font-medium text-gray-700">Photo (JPG, JPEG, PNG, WEBP; max 2 MB)</label>
                <input id="photo" type="file" name="photo" accept=".jpg,.jpeg,.png,.webp" required>
            </div>

            @if ($errors->any())
                <div role="alert" class="rounded bg-red-100 p-3 text-red-800">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <button type="submit" class="rounded bg-blue-600 px-5 py-3 font-semibold text-white hover:bg-blue-700">Save</button>
        </form>
    </section>
</x-app-layout>
