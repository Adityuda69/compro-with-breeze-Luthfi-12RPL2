<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>@yield('title', config('app.name', 'PT Digital Solusi Nusantara'))</title>

        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <style>
            body {
                font-family: 'Poppins', sans-serif;
            }
        </style>
    </head>
    <body class="min-h-screen bg-white font-sans text-gray-800 antialiased">
        <header class="border-b border-gray-200 bg-white">
            <nav aria-label="Main navigation" class="relative mx-auto grid max-w-6xl grid-cols-[1fr_auto_1fr] items-center px-4 py-4">
                <a href="{{ route('home') }}" class="text-lg font-semibold text-gray-900">Logo</a>

                <div class="hidden items-center gap-8 md:flex">
                    <a href="{{ route('home') }}" @class(['text-sm font-medium hover:text-blue-700', 'text-blue-700' => request()->routeIs('home'), 'text-gray-700' => ! request()->routeIs('home')]) @if (request()->routeIs('home')) aria-current="page" @endif>Home</a>
                    <a href="{{ route('companyprofile') }}" @class(['text-sm font-medium hover:text-blue-700', 'text-blue-700' => request()->routeIs('companyprofile'), 'text-gray-700' => ! request()->routeIs('companyprofile')]) @if (request()->routeIs('companyprofile')) aria-current="page" @endif>Profile</a>
                    <a href="{{ route('product.index') }}" @class(['text-sm font-medium hover:text-blue-700', 'text-blue-700' => request()->routeIs('product.*'), 'text-gray-700' => ! request()->routeIs('product.*')]) @if (request()->routeIs('product.*')) aria-current="page" @endif>Product</a>
                    <a href="{{ route('article.index') }}" @class(['text-sm font-medium hover:text-blue-700', 'text-blue-700' => request()->routeIs('article.*'), 'text-gray-700' => ! request()->routeIs('article.*')]) @if (request()->routeIs('article.*')) aria-current="page" @endif>Article</a>
                    <a href="{{ route('gallery.index') }}" @class(['text-sm font-medium hover:text-blue-700', 'text-blue-700' => request()->routeIs('gallery.*'), 'text-gray-700' => ! request()->routeIs('gallery.*')]) @if (request()->routeIs('gallery.*')) aria-current="page" @endif>Gallery</a>
                    <a href="{{ route('contact') }}" @class(['text-sm font-medium hover:text-blue-700', 'text-blue-700' => request()->routeIs('contact'), 'text-gray-700' => ! request()->routeIs('contact')]) @if (request()->routeIs('contact')) aria-current="page" @endif>Contact</a>
                </div>

                <a href="{{ route('login') }}" class="hidden justify-self-end rounded-md bg-blue-700 px-4 py-2 text-sm font-semibold text-white hover:bg-blue-800 md:inline-flex">
                    Login
                </a>

                <details class="group absolute right-4 md:hidden">
                    <summary class="flex cursor-pointer list-none items-center justify-center rounded-md p-2 text-gray-700 hover:bg-gray-100 [&::-webkit-details-marker]:hidden">
                        <span class="sr-only">Open navigation menu</span>
                        <i class="fa-solid fa-bars h-6 w-6 text-center leading-6 group-open:hidden" aria-hidden="true"></i>
                        <i class="fa-solid fa-xmark hidden h-6 w-6 text-center leading-6 group-open:block" aria-hidden="true"></i>
                    </summary>
                    <div class="absolute right-0 top-full z-10 mt-2 w-56 rounded-md border border-gray-200 bg-white p-2 shadow-lg">
                        <a href="{{ route('home') }}" @class(['block rounded px-3 py-2 text-sm font-medium hover:bg-gray-50 hover:text-blue-700', 'text-blue-700' => request()->routeIs('home'), 'text-gray-700' => ! request()->routeIs('home')])>Home</a>
                        <a href="{{ route('companyprofile') }}" @class(['block rounded px-3 py-2 text-sm font-medium hover:bg-gray-50 hover:text-blue-700', 'text-blue-700' => request()->routeIs('companyprofile'), 'text-gray-700' => ! request()->routeIs('companyprofile')])>Profile</a>
                        <a href="{{ route('product.index') }}" @class(['block rounded px-3 py-2 text-sm font-medium hover:bg-gray-50 hover:text-blue-700', 'text-blue-700' => request()->routeIs('product.*'), 'text-gray-700' => ! request()->routeIs('product.*')])>Product</a>
                        <a href="{{ route('article.index') }}" @class(['block rounded px-3 py-2 text-sm font-medium hover:bg-gray-50 hover:text-blue-700', 'text-blue-700' => request()->routeIs('article.*'), 'text-gray-700' => ! request()->routeIs('article.*')])>Article</a>
                        <a href="{{ route('gallery.index') }}" @class(['block rounded px-3 py-2 text-sm font-medium hover:bg-gray-50 hover:text-blue-700', 'text-blue-700' => request()->routeIs('gallery.*'), 'text-gray-700' => ! request()->routeIs('gallery.*')])>Gallery</a>
                        <a href="{{ route('contact') }}" @class(['block rounded px-3 py-2 text-sm font-medium hover:bg-gray-50 hover:text-blue-700', 'text-blue-700' => request()->routeIs('contact'), 'text-gray-700' => ! request()->routeIs('contact')])>Contact</a>
                        <a href="{{ route('login') }}" class="mt-1 block rounded bg-blue-700 px-3 py-2 text-center text-sm font-semibold text-white hover:bg-blue-800">Login</a>
                    </div>
                </details>
            </nav>
        </header>

        <main class="mx-auto w-full max-w-6xl px-4 py-12 md:py-16">
            @yield('content')
        </main>

        @hasSection('footer')
            @yield('footer')
        @else
            @include('components.public.footer')
        @endif
    </body>
</html>
