@extends('layouts.public')

@section('title', 'Company Profile')

@section('content')
    <article class="mx-auto max-w-5xl">
        <h1 class="mb-8 text-3xl font-bold text-gray-900">Company Profile</h1>

        <section class="mb-8">
            <h2 class="mb-3 text-xl font-semibold text-gray-900">Sejarah</h2>
            <p class="leading-7 text-gray-700">{!! filled($data?->sejarah) ? nl2br(e($data->sejarah)) : 'Belum tersedia.' !!}</p>
        </section>

        <section class="mb-8">
            <h2 class="mb-3 text-xl font-semibold text-gray-900">Visi</h2>
            <p class="leading-7 text-gray-700">{!! filled($data?->visi) ? nl2br(e($data->visi)) : 'Belum tersedia.' !!}</p>
        </section>

        <section class="mb-8">
            <h2 class="mb-3 text-xl font-semibold text-gray-900">Misi</h2>
            <p class="leading-7 text-gray-700">{!! filled($data?->misi) ? nl2br(e($data->misi)) : 'Belum tersedia.' !!}</p>
        </section>

        <section class="mb-8">
            <h2 class="mb-3 text-xl font-semibold text-gray-900">Nilai Perusahaan</h2>
            <p class="leading-7 text-gray-700">{!! filled($data?->nilai_perusahaan) ? nl2br(e($data->nilai_perusahaan)) : 'Belum tersedia.' !!}</p>
        </section>
    </article>
@endsection
