<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HaloController extends Controller
{
    public function index()
    {
        return view('halo', [
            'pesan' => 'Halo dari Controller!',
            'timestamp' => now()->format('H:i:s')
        ]);
    }
    public function kontak()
    {
        $kontak = [
            'email' => 'latihan@example.com',
            'telepon' => '0812-3456-7890'
        ];

        return view('kontak', compact('kontak'));
    }
}
