@extends('layouts.app')

@section('title', 'Selamat Datang')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">Selamat Datang di Aplikasi Catatan</div>
            <div class="card-body text-center">
                <h3>Hari 15: Instalasi Laravel Breeze</h3>
                <p class="lead">Halo, Woka!</p>
                <p>Hari ini tanggal: {{ date('d F Y') }}</p>
                <a href="{{ route('login') }}" class="btn btn-primary mt-2">Login</a>
                <a href="{{ route('register') }}" class="btn btn-success mt-2">Register</a>
            </div>
        </div>
    </div>
</div>
@endsection