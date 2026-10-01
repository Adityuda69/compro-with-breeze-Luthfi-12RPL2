<?php

it('shows company information, map, and contact form', function () {
    $this->get(route('contact'))
        ->assertOk()
        ->assertSee('PT Digital Solusi Nusantara')
        ->assertSee('google.com/maps')
        ->assertSee(route('contact.send'), false)
        ->assertSee('Kirim Pesan');
});

it('accepts a contact message without storing it and shows a success message', function () {
    $this->post(route('contact.send'), [
        'name' => 'Pengunjung',
        'email' => 'pengunjung@example.com',
        'message' => 'Saya ingin mengetahui layanan perusahaan.',
    ])
        ->assertRedirect(route('contact'))
        ->assertSessionHas('success', 'pesan berhasil diterima');
});

it('validates required contact fields', function () {
    $this->from(route('contact'))
        ->post(route('contact.send'), [])
        ->assertRedirect(route('contact'))
        ->assertSessionHasErrors(['name', 'email', 'message']);
});
