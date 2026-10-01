<x-app-layout>
    <section class="flex flex-col w-[75%] mx-auto">
        <h1 class="text-4xl font-mono font-bold">Edit Profile Perusahaan</h1>
        <form action="{{ route('dashboard.companyprofile.update') }}" method="POST">
            @csrf
            @method('PUT')
            @if ($errors->any())
                <div role="alert" class="mb-4 rounded bg-red-100 p-3 text-red-800">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <label
                    class="block mb-2.5 text-sm font-medium text-heading" for="sejarah">
            Your sejarah
            </label>
            <textarea
                        class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        id="sejarah"
                        name="sejarah"
                        rows="4"
                        placeholder="write your thoughts here...">


            {{ old('sejarah', $data->sejarah ?? '') }}
            </textarea>
            <label
                    class="block mb-2.5 text-sm font-medium text-heading"
                    for="visi"
            >Your visi</label>
            <textarea
                        class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        id="visi"
                        name="visi"
                        rows="4"
                        placeholder="write your thoughts here...">

            {{ old('visi', $data->visi ?? '') }}
            </textarea>
            <label
                    class="block mb-2.5 text-sm font-medium text-heading" for="misi">
            Your misi
            </label>
            <textarea
                        class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        id="misi"
                        name="misi"
                        rows="4"
                        placeholder="write your thoughts here...">

            {{ old('misi', $data->misi ?? '') }}
            </textarea>
            <label
                    class="block mb-2.5 text-sm font-medium text-heading" for="nilai_perusahaan">
            Your nilai_perusahaan
            </label>
            <textarea
                        class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        id="nilai_perusahaan"
                        name="nilai_perusahaan"
                        rows="4"
                        placeholder="write your thoughts here...">

            {{ old('nilai_perusahaan', $data->nilai_perusahaan ?? '') }}
            </textarea>
            <button type="submit" class="my-6 bg-blue-200 text-blue-700 w-40 h-16">Simpan</button>



        </form>
    </section>
</x-app-layout>
