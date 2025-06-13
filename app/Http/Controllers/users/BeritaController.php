<?php

namespace App\Http\Controllers\users;

use App\Http\Controllers\Controller;
use App\Models\Berita;
use Illuminate\Http\Request;

class BeritaController extends Controller
{
    public function index()
    {
        $berita = Berita::where('status', 'published')->latest()->get();
        return view('users.dashboard', compact('berita'));
    }

    public function show(Berita $berita)
    {
        if ($berita->status !== 'published') {
            abort(404);
        }

        return view('users.show', compact('berita'));
    }
}
