@extends('layouts.app')

@section('title', 'Kontak Kami')

@section('content')
<div class="text-center">
    <div class="mb-3">
        <span class="badge bg-success-subtle text-success px-3 py-2 rounded-pill fw-semibold">Halaman Kontak</span>
    </div>
    <h2 class="fw-bold text-dark mb-3">Hubungi Kami</h2>
    <p class="text-muted mb-4">Silakan hubungi kami melalui formulir atau informasi di bawah ini untuk pertanyaan seputar project Laravel.</p>
    
    <ul class="list-unstyled text-muted mb-4">
    <li>📧 Email: <strong>{{ $kontak['email'] }}</strong></li>
    <li>📱 WhatsApp: <strong>{{ $kontak['telepon'] }}</strong></li>
</ul>

    <a href="/" class="btn btn-outline-dark rounded-pill px-4">Kembali ke Beranda</a>
</div>
@endsection