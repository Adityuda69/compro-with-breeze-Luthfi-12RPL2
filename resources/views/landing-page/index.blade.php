@extends('layouts.public')

@section('content')
    <x-landing-page.home/>
    <x-landing-page.head-section>Profil</x-landing-page.head-section>
    <x-landing-page.profile :company-profile="$companyProfile"/>
    <x-landing-page.head-section>Layanan Unggulan</x-landing-page.head-section>
    <x-landing-page.featured-products :products="$products"/>
    <x-landing-page.head-section>Artikel Terbaru</x-landing-page.head-section>
    <x-landing-page.latest-articles :articles="$articles"/>
    <x-landing-page.head-section>Galeri</x-landing-page.head-section>
    <x-landing-page.gallery-preview :galleries="$galleries"/>
@endsection

@section('footer')
    <x-landing-page.footer/>
@endsection
