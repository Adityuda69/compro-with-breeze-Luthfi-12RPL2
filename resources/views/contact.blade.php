@extends('layouts.public')

@section('title', 'Contact')

@section('content')
    <div class="space-y-12">
        <section aria-labelledby="company-identity">
            <h1 id="company-identity" class="text-3xl font-bold text-gray-900">PT Digital Solusi Nusantara</h1>
            <p class="mt-3 max-w-3xl leading-7 text-gray-600">
                Mitra solusi teknologi informasi untuk pengembangan website, jaringan komputer, dan konsultasi IT.
            </p>
        </section>

        <section aria-labelledby="company-map">
            <h2 id="company-map" class="text-2xl font-semibold text-gray-900">Lokasi Perusahaan</h2>
            <p class="mt-2 text-sm text-gray-600">
                Peta menampilkan hasil pencarian nama perusahaan di Google Maps.
            </p>
            <div class="mt-4 overflow-hidden rounded-lg border border-gray-200">
                <iframe
                    title="Pencarian lokasi PT Digital Solusi Nusantara di Google Maps"
                    src="https://www.google.com/maps?q=PT%20Digital%20Solusi%20Nusantara&output=embed"
                    class="h-80 w-full"
                    loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade"
                    allowfullscreen>
                </iframe>
            </div>
        </section>

        <section aria-labelledby="contact-form-title" class="mx-auto max-w-3xl">
            <h2 id="contact-form-title" class="text-2xl font-semibold text-gray-900">Kirim Pesan</h2>
            <p class="mt-2 text-sm text-gray-600">Pesan hanya diproses untuk menampilkan konfirmasi dan tidak disimpan.</p>

            @if (session('success'))
                <div role="status" class="mt-5 rounded-md border border-green-200 bg-green-50 p-4 text-green-800">
                    {{ session('success') }}
                </div>
            @endif

            @if ($errors->any())
                <div role="alert" class="mt-5 rounded-md border border-red-200 bg-red-50 p-4 text-red-800">
                    <ul class="list-inside list-disc">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('contact.send') }}" method="POST" class="mt-6 space-y-5">
                @csrf
                <div>
                    <label for="name" class="mb-1 block text-sm font-medium text-gray-700">Nama</label>
                    <input id="name" name="name" type="text" value="{{ old('name') }}" required maxlength="255" autocomplete="name"
                        class="w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                </div>

                <div>
                    <label for="email" class="mb-1 block text-sm font-medium text-gray-700">Email</label>
                    <input id="email" name="email" type="email" value="{{ old('email') }}" required maxlength="255" autocomplete="email"
                        class="w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                </div>

                <div>
                    <label for="message" class="mb-1 block text-sm font-medium text-gray-700">Pesan</label>
                    <textarea id="message" name="message" rows="5" required maxlength="5000"
                        class="w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">{{ old('message') }}</textarea>
                </div>

                <button type="submit" class="rounded-md bg-blue-700 px-5 py-2.5 text-sm font-semibold text-white hover:bg-blue-800 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
                    Kirim Pesan
                </button>
            </form>
        </section>
    </div>
@endsection
