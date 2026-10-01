@extends('layouts.public')

@section('title', 'Articles')

@section('content')
    <h1 style="background-color: lightgreen">
        ini file view article dengan background hijau terang>
    </h1>
    <p class='bg-red-300'> {{ $data[0]->title }} </p>
    <p class='bg-red-300'> {{ $data[0]->content }} </p>
    <img src="{{ asset(Storage::url($data[0]->image)) }}" alt="" class="w-20"



    <div class="bg-gray-100 min-h-screen py-10">

        <div class="grid grid-cols-1 gap-6 p-6 md:grid-cols-3">

            @foreach ($data as $article)

                <article class="overflow-hidden rounded-lg bg-white shadow-md">

                    {{-- Gambar --}}
                    <div class="relative">
                        <img
                            src="{{ asset(Storage::url($article->image)) }}"
                            alt="{{ $article->title }}"
                            class="h-48 w-full object-cover"
                        >


                        {{-- Category --}}
                        <span class="absolute left-4 top-4 rounded-full bg-indigo-600 px-3
                        py-1 text-xs font-bold text-white">
                            TECHNOLOGY
                        </span>
                    </div>

                    {{-- Content --}}
                    <div class="p-5">

                        {{-- Tanggal --}}
                        <div class="mb-3 text-sm text-gray-500">
                            Sep 24, 2026
                            <span class="mx-2">•</span>
                            5 min read
                        </div>

                        {{-- Judul --}}
                        <h2 class="text-xl font-bold leading-tight text-gray-900">
                            {{ $article->title }}
                        </h2>

                        {{-- Isi --}}
                        <p class="mt-3 line-clamp-3 text-gray-600">
                            {{ $article->content }}
                        </p>

                        {{-- Button --}}
                        <div class="mt-5">
                            <a
                                href="#"
                                class="inline-block rounded-lg bg-indigo-600 px-4 py-2
                                text-sm font-semibold text-white hover:bg-indigo-700"
                            >
                                Read more →
                            </a>
                        </div>

                    </div>

                </article>

            @endforeach

        </div>

    </div>

@endsection

