<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Tambah Buku Baru') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">

                <h3 class="text-lg font-semibold text-gray-800 mb-6">
                    Tambah Data Buku
                </h3>

                {{-- Pesan Error Validasi --}}
                @if ($errors->any())
                    <div class="mb-6 p-4 bg-red-100 border border-red-400 text-red-700 rounded-md">
                        <ul class="list-disc list-inside">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                {{-- Pesan Berhasil --}}
                @if (session('success'))
                    <div class="mb-6 p-4 bg-green-100 border border-green-400 text-green-700 rounded-md">
                        {{ session('success') }}
                    </div>
                @endif

                <form
                    action="{{ route('admin.buku.store') }}"
                    method="POST"
                >
                    @csrf

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
                            value="{{ old('kode_buku') }}"
                            class="border border-gray-300 rounded-md shadow-sm w-full px-3 py-2 focus:border-indigo-500 focus:ring-indigo-500"
                            placeholder="Contoh: BK-001"
                            required
                        >

                        @error('kode_buku')
                            <p class="text-red-500 text-sm mt-1">
                                {{ $message }}
                            </p>
                        @enderror
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
                            value="{{ old('judul') }}"
                            class="border border-gray-300 rounded-md shadow-sm w-full px-3 py-2 focus:border-indigo-500 focus:ring-indigo-500"
                            placeholder="Masukkan judul buku"
                            required
                        >

                        @error('judul')
                            <p class="text-red-500 text-sm mt-1">
                                {{ $message }}
                            </p>
                        @enderror
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
                            value="{{ old('pengarang') }}"
                            class="border border-gray-300 rounded-md shadow-sm w-full px-3 py-2 focus:border-indigo-500 focus:ring-indigo-500"
                            placeholder="Masukkan nama pengarang"
                            required
                        >

                        @error('pengarang')
                            <p class="text-red-500 text-sm mt-1">
                                {{ $message }}
                            </p>
                        @enderror
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
                            value="{{ old('penerbit') }}"
                            class="border border-gray-300 rounded-md shadow-sm w-full px-3 py-2 focus:border-indigo-500 focus:ring-indigo-500"
                            placeholder="Masukkan nama penerbit"
                            required
                        >

                        @error('penerbit')
                            <p class="text-red-500 text-sm mt-1">
                                {{ $message }}
                            </p>
                        @enderror
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
                            value="{{ old('stok', 0) }}"
                            min="0"
                            class="border border-gray-300 rounded-md shadow-sm w-full px-3 py-2 focus:border-indigo-500 focus:ring-indigo-500"
                            placeholder="Masukkan jumlah stok"
                            required
                        >

                        @error('stok')
                            <p class="text-red-500 text-sm mt-1">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>

                    {{-- Tombol --}}
                    <div class="flex items-center gap-3">

                        <button
                            type="submit"
                            class="inline-flex items-center px-5 py-2.5 bg-[#000b25] text-white font-medium rounded-md shadow-sm hover:bg-[#00143f] focus:outline-none focus:ring-2 focus:ring-blue-500 cursor-pointer"
                        >
                            💾 Simpan
                        </button>

                        <a
                            href="{{ route('admin.buku.index') }}"
                            class="inline-flex items-center px-5 py-2.5 bg-gray-500 text-white font-medium rounded-md hover:bg-gray-600 rounded-md"
                        >
                            ↩ Batal
                        </a>

                    </div>

                </form>

            </div>

        </div>
    </div>

</x-app-layout>
