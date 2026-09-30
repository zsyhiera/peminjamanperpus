<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Data Buku') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">

                <h3 class="text-lg font-semibold text-gray-800 mb-6">
                    ✏️ Edit Data Buku
                </h3>

                <form action="{{ route('admin.buku.update', $buku->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    {{-- Kode Buku --}}
                    <div class="mb-4">
                        <label
                            for="kode_buku"
                            class="block font-medium text-sm text-gray-700 mb-1"
                        >
                            Kode Buku
                        </label>

                        <input
                            type="text"
                            id="kode_buku"
                            name="kode_buku"
                            value="{{ old('kode_buku', $buku->kode_buku) }}"
                            class="border-gray-300 rounded-md shadow-sm w-full"
                            required
                        >
                    </div>

                    {{-- Judul Buku --}}
                    <div class="mb-4">
                        <label
                            for="judul"
                            class="block font-medium text-sm text-gray-700 mb-1"
                        >
                            Judul Buku
                        </label>

                        <input
                            type="text"
                            id="judul"
                            name="judul"
                            value="{{ old('judul', $buku->judul) }}"
                            class="border-gray-300 rounded-md shadow-sm w-full"
                            required
                        >
                    </div>

                    {{-- Pengarang --}}
                    <div class="mb-4">
                        <label
                            for="pengarang"
                            class="block font-medium text-sm text-gray-700 mb-1"
                        >
                            Pengarang
                        </label>

                        <input
                            type="text"
                            id="pengarang"
                            name="pengarang"
                            value="{{ old('pengarang', $buku->pengarang) }}"
                            class="border-gray-300 rounded-md shadow-sm w-full"
                            required
                        >
                    </div>

                    {{-- Penerbit --}}
                    <div class="mb-4">
                        <label
                            for="penerbit"
                            class="block font-medium text-sm text-gray-700 mb-1"
                        >
                            Penerbit
                        </label>

                        <input
                            type="text"
                            id="penerbit"
                            name="penerbit"
                            value="{{ old('penerbit', $buku->penerbit) }}"
                            class="border-gray-300 rounded-md shadow-sm w-full"
                            required
                        >
                    </div>

                    {{-- Stok --}}
                    <div class="mb-6">
                        <label
                            for="stok"
                            class="block font-medium text-sm text-gray-700 mb-1"
                        >
                            Stok
                        </label>

                        <input
                            type="number"
                            id="stok"
                            name="stok"
                            value="{{ old('stok', $buku->stok) }}"
                            min="0"
                            class="border-gray-300 rounded-md shadow-sm w-full"
                            required
                        >
                    </div>

                    {{-- Tombol --}}
                    <div class="flex items-center gap-3">

                        <button
                            type="submit"
                            style="background-color: #2563eb; color: white; padding: 10px 20px; border-radius: 6px; border: none; cursor: pointer;"
                        >
                            💾 Update
                        </button>

                        <a
                            href="{{ route('admin.buku.index') }}"
                            style="background-color: #6b7280; color: white; padding: 10px 20px; border-radius: 6px; text-decoration: none;"
                        >
                            ↩ Batal
                        </a>

                    </div>

                </form>

            </div>

        </div>
    </div>

</x-app-layout>