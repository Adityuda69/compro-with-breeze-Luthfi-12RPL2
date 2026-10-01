<x-app-layout>
    <a
        href="/dashboard/article/add"
        class="bg-blue-500 text-white text-4xl p-4">
        +Tambah article
    </a>
    {{-- kode tabel --}}

    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">

        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">

            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>

                    {{-- NO --}}
                    <th scope="col" class="px-6 py-3">
                        NO
                    </th>

                    {{-- IMAGE --}}
                    <th scope="col" class="px-6 py-3">
                        IMAGE
                    </th>

                    {{-- TITLE --}}
                    <th scope="col" class="px-6 py-3">
                        TITLE
                    </th>

                    {{-- CONTENT --}}
                    <th scope="col" class="px-6 py-3">
                        CONTENT
                    </th>

                    {{-- ACTION --}}
                    <th scope="col" class="px-6 py-3">
                        Action
                    </th>

                </tr>
            </thead>


            <tbody>
                <h1>LUTHFI</h1>

                @foreach ($data as $dt)

                    <tr class="odd:bg-white odd:dark:bg-gray-900
                               even:bg-gray-50 even:dark:bg-gray-800
                               border-b dark:border-gray-700 border-gray-200">

                        {{-- NO --}}
                        <th scope="row"
                            class="px-6 py-4 font-medium text-gray-900
                                   whitespace-nowrap dark:text-white">

                            {{ $loop->iteration }}

                        </th>


                        {{-- IMAGE --}}
                        <td class="px-6 py-4">

                            <img
                                class="w-20 h-20 object-cover rounded-lg"
                                src="{{ asset(Storage::url($dt->image)) }}"
                                alt="image"
                            >

                        </td>


                        {{-- TITLE --}}
                        <td class="px-6 py-4">

                            {{ $dt->title }}

                        </td>


                        {{-- CONTENT --}}
                        <td class="px-6 py-4">

                            {{ $dt->content }}

                        </td>


                        {{-- ACTION --}}
                        <td class="px-6 py-4">

                            <a href="/dashboard/article/{{ $dt->id }}/edit" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
                            <form action="{{ route('dashboard.articles.destroy', $dt) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button
                                    type="submit"
                                    class="bg bg-red-600 text-white p-2"
                                    onclick="return confirm('Yakin di hapus ?')">
                                    DIHAPUS

                                </button>
                            </form>

                        </td>


                    </tr>
                    
                @endforeach

            </tbody>

        </table>

    </div>

</x-app-layout>
