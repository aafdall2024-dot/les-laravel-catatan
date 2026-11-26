<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;

class BerandaController extends Controller
{
    public function index()

    {
        $judul = 'Selamat Datang di Les Laravel';
    $hari = 'Hari ke-5';
    $nama = 'Murid Laravel';
    $menu = ['Beranda', 'Halo', 'Tentang', 'Kontak','bantuan'];

    return view('welcome', compact('judul', 'hari', 'nama', 'menu'));
    }
}
