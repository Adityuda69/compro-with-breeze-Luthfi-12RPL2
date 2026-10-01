<x-app-layout>
    <section class="p-8">
        <h1 class="text-6xl font-extrabold">Edit Data Article</h1>
        <form action="{{ route('dashboard.articles.update', $data) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method("PUT")

            <p>Title</P>
            <input type="text" name='title' value="{{ $data->title }}">

            <p>Content</p>
            <textarea name="content" id="content" cols="80" rows="10">
                {{ $data->content }}
            </textarea>

            <p>image</p>
            <input type="file" name='image' accept="image/*">
            {{-- nanti ada preview di bawah ini (soal) --}}

            <button type="submit" class="bg-blue-500 rounded-lg p-3">UPDATE</button>
            @if ($errors->any())
                <div class="bg-red-300 text-gray-500 p-2">
                    <ul>
                        @foreach ( $errors->all() as $error )
                            <li>{{ $error }}</li>

                        @endforeach

                    </ul>
                </div>

            @endif

        </form>
    </section>

</x-app-layout>
