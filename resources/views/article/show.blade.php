<x-landing-page.layout>
    <h1 class="mb-4 text-4xl font-extrabold leading-none tracking-tight text-gray-900 md:text-5xl lg:text-6xl dark:text-white">{{ $data->title }}</h1>
    <div>
        <img src="{{ asset('Storage/' .$data->image) }}"
        class="w-full h-full object-cover rounded"
        alt="image">

    </div>
    <p class="text-lg text-gray-500 leading-8">
        {{ $data->content }}
    </p>
    

</x-landing-page.layout>
