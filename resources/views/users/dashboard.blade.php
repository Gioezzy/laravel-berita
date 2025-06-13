<x-app-layout>
    <div class="mb-10 text-center">
        <h2 class="text-4xl font-extrabold text-blue-900">Berita Terbaru</h2>
        <p class="mt-2 text-gray-600">Dapatkan informasi terkini seputar kegiatan terbaru kami</p>
    </div>

    <div class="grid gap-8 md:grid-cols-2 lg:grid-cols-3">
        @foreach ($berita as $beritas)
            <div
                class="overflow-hidden transition-transform transform bg-white rounded-2xl shadow hover:scale-[1.02] hover:shadow-xl">
                <img src="{{ asset('storage/' . $beritas->gambar) }}" alt="{{ $beritas->judul }}"
                    class="object-cover w-full h-52">
                <div class="p-5">
                    <h3 class="text-xl font-bold text-gray-800 transition-colors duration-200 hover:text-blue-700">
                        {{ $beritas->judul }}
                    </h3>
                    <p class="mt-1 text-sm text-gray-500">{{ $beritas->penulis }} &middot; {{ $beritas->tanggal }}</p>
                    <p class="mt-3 text-sm text-gray-600 line-clamp-3">{{ Str::limit($beritas->isi, 100) }}</p>
                    <a href="{{ route('berita.show', $beritas) }}"
                        class="inline-block mt-4 text-sm font-semibold text-blue-600 hover:underline">
                        Baca Selengkapnya →
                    </a>
                </div>
            </div>
        @endforeach
    </div>
</x-app-layout>