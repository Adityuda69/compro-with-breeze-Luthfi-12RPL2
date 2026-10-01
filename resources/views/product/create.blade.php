<x-app-layout>
    <section class="p-8">
        <h1 class="text-6xl font-extrabold">Tambah Data Product</h1>
        <form action="{{url('dashboard/product')}}" method="POST" enctype="multipart/form-data">
            @csrf
            @method("POST")

            <p>Title</P>
            <input type="text" name='title'>

            <p>Description</p>
            <textarea name="description" id="description" cols="80" rows="10"></textarea>

            <p>image</p>
            <input type="file" name='image' accept="image/*">

            <button type="submit" class="bg-blue-500 rounded-lg p-3">Simpan</button>
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
