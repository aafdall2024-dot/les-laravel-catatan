<?php

namespace App\Http\Controllers;

use App\Models\Kontak;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use PharIo\Manifest\Email;

class KontakController extends Controller
{
    public function index()
    {
        $kontak = Kontak::all();

        return view('kontak.index', compact('kontak'));
    }
    public function create()
    {
        return view('kontak.create');
    }


    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|max:100',
            'email' => 'required|email|unique:kontak,email', // Tambahkan unique:kontak,email
            'pesan' => 'required',
            'lampiran' => 'nullable|file|mimes:jpg,jpeg,png,pdf,txt|max:2048'
        ]);

        $data = $request->only(['nama', 'email', 'pesan']);

        if ($request->hasFile('lampiran')) {
            $file = $request->file('lampiran');
            $filename = time() . '_' . $file->getClientOriginalName();

            // Tambahkan parameter 'public' di sini:
            $file->storeAs('lampiran', $filename, 'public');

            $data['lampiran'] = $filename;
        }

        Kontak::create($data);
        return redirect('/kontak')->with('sukses', 'Kontak berhasil disimpan!');
    }


    public function show($id)
    {
        $kontak = Kontak::findOrFail($id);
        return view('kontak.show', compact('kontak'));
    }
    public function edit($id)
    {
        $kontak = Kontak::findOrFail($id);
        return view('kontak.edit', compact('kontak'));
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required|max:100',
            'email' => 'required|email|unique:kontak,email,' . $id,
            'pesan' => 'required',
            'lampiran' => 'nullable|file|mimes:jpg,jpeg,png,pdf,txt|max:2048'
        ], [
            'nama.required' => 'nama wajib diisi.',
            'nama.max' => 'nama maksimal 100 karakter.',
            'email.required' => 'Isi catatan tidak boleh kosong.',
            'email.email' => 'email tidak valid.',
            'email.unique' => 'email sudah terdaftar',
            'pesan.required' => 'pesan tidak boleh kosong.',
        ]);

        $kontak = Kontak::findOrFail($id);
        $data = $request->only(['nama', 'email', 'pesan']);

        if ($request->hasFile('lampiran')) {
            // Hapus file lama jika ada
            if ($kontak->lampiran) {
                Storage::disk('public')->delete('lampiran/' . $kontak->lampiran);
            }

            $file = $request->file('lampiran');
            $filename = time() . '_' . $file->getClientOriginalName();

            // Tambahkan parameter 'public' di sini juga:
            $file->storeAs('lampiran', $filename, 'public');

            $data['lampiran'] = $filename;
        }

        $kontak->update($data);
        return redirect("/kontak/{$kontak->id}")->with('sukses', 'Kontak berhasil diperbarui!');
    }
    public function destroy($id)
    {
        $kontak = Kontak::findOrFail($id);
        $kontak->delete();
        return redirect('/kontak')->with('sukses', 'kontak berhasil dihapus.');
    }
}
