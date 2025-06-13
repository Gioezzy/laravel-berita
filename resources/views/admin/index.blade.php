<x-app-layout>
    <div class="flex items-center justify-between mb-6">
        <h2 class="text-3xl font-bold text-blue-800">📰 Manajemen Berita</h2>
        <a href="{{ route('admin.berita.create') }}" class="px-4 py-2 font-semibold text-white transition bg-blue-600 rounded hover:bg-blue-700">➕ Tambah Berita</a>
    </div>

    @if(session('success'))
        <div class="px-4 py-3 mb-4 text-green-800 bg-green-100 border border-green-300 rounded">
            {{ session('success') }}
        </div>
    @endif

    <div class="grid gap-4 md:grid-cols-2 lg:grid-cols-3">
        @forelse ($berita as $b)
        <div class="p-4 transition bg-white border border-gray-200 rounded shadow hover:shadow-md">
            @if ($b->gambar)
                <img src="{{ asset('storage/' . $b->gambar) }}" alt="Thumbnail" class="object-cover w-full h-40 mb-4 rounded">
            @endif
            <h3 class="text-xl font-semibold text-blue-700">{{ $b->judul }}</h3>
            <p class="mb-2 text-sm text-gray-600">✍️ {{ $b->penulis }} • 📅 {{ \Carbon\Carbon::parse($b->tanggal)->format('d M Y') }}</p>

            <div class="flex justify-between mt-3">
                <a href="{{ route('admin.berita.edit', $b->id) }}" class="text-sm text-blue-600 hover:underline">✏️ Edit</a>
                <form action="{{ route('admin.berita.destroy', $b->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus?')">
                    @csrf
                    @method('DELETE')
                    <button class="text-sm text-red-600 hover:underline">🗑️ Hapus</button>
                </form>
            </div>
        </div>
        @empty
            <p class="col-span-3 text-gray-600">Belum ada berita.</p>
        @endforelse
    </div>
</x-app-layout>
