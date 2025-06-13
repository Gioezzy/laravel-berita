<x-app-layout>
    <div class="max-w-4xl px-6 py-10 mx-auto bg-white shadow-lg rounded-2xl">
        <h1 class="text-4xl font-extrabold leading-snug text-blue-900">{{ $berita->judul }}</h1>
        <p class="mt-2 text-sm text-gray-500">{{ $berita->penulis }} • {{ $berita->tanggal }}</p>

        <img src="{{ asset('storage/' . $berita->gambar) }}" alt="{{ $berita->judul }}"
            class="w-full my-6 rounded-lg shadow-sm object-cover max-h-[450px]">

        <div class="prose prose-lg text-gray-800 max-w-none">
            {!! nl2br(e($berita->isi)) !!}
        </div>

        <a href="{{ route('berita') }}"
            class="inline-block mt-8 font-semibold text-blue-600 transition hover:text-blue-800">
            ← Kembali ke Berita
        </a>
    </div>
</x-app-layout>