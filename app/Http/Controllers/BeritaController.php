<?php

namespace App\Http\Controllers;

use App\Http\Requests\BeritaStoreRequest;
use App\Http\Requests\BeritaUpdateRequest;
use App\Models\Berita;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BeritaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $berita  = Berita::latest()->get();
        return view('admin.index', compact('berita'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(BeritaStoreRequest $request)
    {
        $data = $request->validated();

        $data['gambar'] = $request->file('gambar')->store('berita', 'public');

        Berita::create($data);

        return redirect()->route('admin.berita.index');
    }

    /**
     * Display the specified resource.
     */
    // public function show(Berita $berita)
    // {
    //     return view('users.show', compact('berita'));
    // }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $berita = Berita::findOrFail($id);
        return view('admin.edit', compact('berita'));
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(BeritaUpdateRequest $request, $id): RedirectResponse
    {
        $berita = Berita::findOrFail($id);

        $data = $request->validated();

        if ($request->hasFile('gambar')) {
            if ($berita->gambar && Storage::disk('public')->exists($berita->gambar)) {
                Storage::disk('public')->delete($berita->gambar);
            }
            $data['gambar'] = $request->file('gambar')->store('berita', 'public');
        }

        $berita->update($data);

        return redirect()->route('admin.berita.index')->with('success', 'Berita berhasil diperbarui');
    }



    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Berita $berita)
    {
        // Hapus gambar dari storage
        if ($berita->gambar && Storage::disk('public')->exists($berita->gambar)) {
            Storage::disk('public')->delete($berita->gambar);
        }

        $berita->delete();

        return redirect()->route('admin.berita.index')->with('success', 'Berita berhasil dihapus');
    }
}
