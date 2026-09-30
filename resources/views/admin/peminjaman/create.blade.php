<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Form Peminjaman Buku') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">

                <form action="{{ route('admin.peminjaman.store') }}" method="POST">
                    @csrf

                    {{-- Pilih Siswa --}}
                    <div class="mb-4">
                        <label class="block font-medium text-sm text-gray-700 mb-1">
                            Pilih Siswa / Anggota
                        </label>

                        <select
                            name="user_id"
                            class="border-gray-300 rounded-md shadow-sm w-full"
                            required>

                            <option value="">-- Pilih Siswa --</option>

                            @foreach($users as $usr)
                                <option value="{{ $usr->id }}">
                                    {{ $usr->name }} ({{ $usr->email }})
                                </option>
                            @endforeach

                        </select>

                        @error('user_id')
                            <p class="text-red-500 text-sm mt-1">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>

                    {{-- Pilih Buku --}}
                    <div class="mb-4">
                        <label class="block font-medium text-sm text-gray-700 mb-1">
                            Pilih Buku (Stok Tersedia)
                        </label>

                        <select
                            name="buku_id"
                            class="border-gray-300 rounded-md shadow-sm w-full"
                            required>

                            <option value="">-- Pilih Buku --</option>

                            @foreach($bukus as $buku)
                                <option value="{{ $buku->id }}">
                                    {{ $buku->judul }} (Stok: {{ $buku->stok }})
                                </option>
                            @endforeach

                        </select>

                        @error('buku_id')
                            <p class="text-red-500 text-sm mt-1">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>

                    {{-- Tanggal Pinjam --}}
                    <div class="mb-4">
                        <label class="block font-medium text-sm text-gray-700 mb-1">
                            Tanggal Pinjam
                        </label>

                        <input
                            type="date"
                            name="tanggal_pinjam"
                            value="{{ old('tanggal_pinjam', date('Y-m-d')) }}"
                            class="border-gray-300 rounded-md shadow-sm w-full"
                            required>

                        @error('tanggal_pinjam')
                            <p class="text-red-500 text-sm mt-1">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>

                    {{-- Tanggal Pengembalian --}}
                    <div class="mb-4">
                        <label class="block font-medium text-sm text-gray-700 mb-1">
                            Tanggal Batas Pengembalian
                        </label>

                        <input
                            type="date"
                            name="tanggal_kembali"
                            value="{{ old('tanggal_kembali', date('Y-m-d', strtotime('+7 days'))) }}"
                            class="border-gray-300 rounded-md shadow-sm w-full"
                            required>

                        @error('tanggal_kembali')
                            <p class="text-red-500 text-sm mt-1">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>

                    {{-- Tombol --}}
                    <div class="flex items-center gap-2">

                        <button
                            type="submit"
                            class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-md">
                            Simpan Peminjaman
                        </button>

                        <a
                            href="{{ route('admin.peminjaman.index') }}"
                            class="text-gray-600 hover:text-gray-800">
                            Batal
                        </a>

                    </div>

                </form>

            </div>
        </div>
    </div>
</x-app-layout>