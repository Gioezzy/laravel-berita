<x-app-layout>
    <h2 class="mb-6 text-3xl font-bold text-blue-800">➕ Tambah Berita Baru</h2>

    <form action="{{ route('admin.berita.store') }}" method="POST" enctype="multipart/form-data" class="p-6 space-y-6 bg-white rounded shadow">
        @csrf

        <x-input-label for="judul" :value="__('Judul')" />
        <x-text-input id="judul" class="block w-full" name="judul" type="text" />

        <x-input-label for="isi" :value="__('Isi')" />
        <textarea id="isi" name="isi" rows="5" class="block w-full border-gray-300 rounded"></textarea>

        <x-input-label for="gambar" :value="__('Gambar')" />
        <input type="file" name="gambar" id="gambar" class="block w-full">

        <x-input-label for="penulis" :value="__('Penulis')" />
        <x-text-input id="penulis" class="block w-full" name="penulis" type="text" />

        <x-input-label for="tanggal" :value="__('Tanggal')" />
        <x-text-input id="tanggal" class="block w-full" name="tanggal" type="date" />

        <x-input-label for="status" :value="__('Status')" />
        <select id="status" name="status" class="block w-full border-gray-300 rounded">
            <option value="published">Published</option>
            <option value="not_published">Not Published</option>
        </select>

        <x-primary-button>Simpan ✅</x-primary-button>
    </form>
</x-app-layout>
