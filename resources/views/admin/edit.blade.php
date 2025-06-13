<x-app-layout>
    <h2 class="mb-6 text-3xl font-bold text-blue-800">✏️ Edit Berita</h2>

    <form action="{{ route('admin.berita.update', $berita->id) }}" method="POST" enctype="multipart/form-data" class="p-6 space-y-6 bg-white rounded shadow">
        @csrf
        @method('PUT')

        <x-input-label for="judul" :value="__('Judul')" />
        <x-text-input id="judul" class="block w-full" name="judul" type="text" value="{{ old('judul', $berita->judul) }}" />

        <x-input-label for="isi" :value="__('Isi')" />
        <textarea id="isi" name="isi" rows="5" class="block w-full border-gray-300 rounded">{{ old('isi', $berita->isi) }}</textarea>

        <x-input-label for="gambar" :value="__('Gambar (opsional)')" />
        <input type="file" name="gambar" id="gambar" class="block w-full">
        @if ($berita->gambar)
            <img src="{{ asset('storage/' . $berita->gambar) }}" class="w-32 mt-2 rounded shadow" alt="Gambar lama">
        @endif

        <x-input-label for="penulis" :value="__('Penulis')" />
        <x-text-input id="penulis" class="block w-full" name="penulis" type="text" value="{{ old('penulis', $berita->penulis) }}" />

        <x-input-label for="tanggal" :value="__('Tanggal')" />
        <x-text-input id="tanggal" class="block w-full" name="tanggal" type="date" value="{{ old('tanggal', $berita->tanggal) }}" />

        <x-input-label for="status" :value="__('Status')" />
        <select id="status" name="status" class="block w-full border-gray-300 rounded">
            <option value="published" {{ old('status', $berita->status) == 'published' ? 'selected' : '' }}>Published</option>
            <option value="not_published" {{ old('status', $berita->status) == 'not_published' ? 'selected' : '' }}>Not Published</option>
        </select>

        <button type="submit" class="px-4 py-2 font-bold text-white transition bg-green-600 rounded hover:bg-green-700">💾 Simpan Perubahan</button>
    </form>
</x-app-layout>
