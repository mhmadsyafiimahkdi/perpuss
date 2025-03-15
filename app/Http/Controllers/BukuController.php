<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BukuController extends Controller
{
    //
    public function index()
    {
        $bukus = Buku::all();
        return view('buku.index', compact('bukus'));
    }

    public function create()
    {
        return view('buku.create');
    }

    public function store(Request $request)
{
    $request->validate([
        'judul_buku' => 'required',
        'pengarang' => 'required',
        'jenis_buku' => 'required',
        'tahun_terbit' => 'required|integer',
        'sampul' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
    ]);

    $filePath = null;
    if ($request->hasFile('sampul')) {
        $filePath = $request->file('sampul')->store('sampul_buku', 'public');
    }

    Buku::create([
        'judul_buku' => $request->judul_buku,
        'pengarang' => $request->pengarang,
        'jenis_buku' => $request->jenis_buku,
        'tahun_terbit' => $request->tahun_terbit,
        'sampul' => $filePath, // Pastikan hanya menyimpan jika ada file
    ]);

    return redirect()->route('buku.index')->with('success', 'Buku berhasil ditambahkan!');
}

    public function edit($id)
    {
        $buku = Buku::findOrFail($id);
        return view('buku.edit', compact('buku'));
    }

public function update(Request $request, $id)
{
    $buku = Buku::findOrFail($id);

    $request->validate([
        'judul_buku' => 'required',
        'pengarang' => 'required',
        'jenis_buku' => 'required',
        'tahun_terbit' => 'required|integer',
        'sampul' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
    ]);

    if ($request->hasFile('sampul')) {
        if ($buku->sampul) {
            Storage::disk('public')->delete($buku->sampul);
        }
        $buku->sampul = $request->file('sampul')->store('sampul_buku', 'public');
    }

    $buku->update($request->except(['sampul']));

    return redirect()->route('buku.index')->with('success', 'Buku berhasil diperbarui!');
}


    public function destroy($id)
    {
        $buku = Buku::findOrFail($id);
        if ($buku->sampul) {
            Storage::disk('public')->delete($buku->sampul);
        }
        $buku->delete();
        return redirect()->route('buku.index')->with('success', 'Buku berhasil dihapus!');
    }

    // update
    
}