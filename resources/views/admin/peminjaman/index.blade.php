<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Kelola Transaksi Peminjaman Buku') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">

                {{-- Tombol Tambah Peminjaman --}}
                <a href="{{ route('admin.peminjaman.create') }}"
                   class="bg-emerald-600 hover:bg-emerald-700 text-white font-semibold px-4 py-2 rounded-md mb-4 inline-block shadow">
                    + Catat Peminjaman Baru
                </a>

                {{-- Pesan Berhasil --}}
                @if(session('success'))
                    <div class="bg-green-100 text-green-700 p-3 rounded mb-4">
                        {{ session('success') }}
                    </div>
                @endif

                {{-- Pesan Error --}}
                @if(session('error'))
                    <div class="bg-red-100 text-red-700 p-3 rounded mb-4">
                        {{ session('error') }}
                    </div>
                @endif

                {{-- Tabel Peminjaman --}}
                <div class="overflow-x-auto">
                    <table class="w-full border-collapse border border-gray-300 mt-4">

                        <thead>
                            <tr class="bg-gray-200 text-gray-700">
                                <th class="border border-gray-300 p-2">No</th>
                                <th class="border border-gray-300 p-2">Nama Peminjam</th>
                                <th class="border border-gray-300 p-2">Judul Buku</th>
                                <th class="border border-gray-300 p-2">Tgl Pinjam</th>
                                <th class="border border-gray-300 p-2">Tgl Kembali</th>
                                <th class="border border-gray-300 p-2">Status</th>
                                <th class="border border-gray-300 p-2">Aksi</th>
                            </tr>
                        </thead>

                        <tbody>
                            @forelse($peminjamans as $index => $p)
                                <tr class="hover:bg-gray-50">

                                    {{-- Nomor --}}
                                    <td class="border border-gray-300 p-2 text-center">
                                        {{ $index + 1 }}
                                    </td>

                                    {{-- Nama Peminjam --}}
                                    <td class="border border-gray-300 p-2">
                                        {{ $p->user->name ?? '-' }}
                                    </td>

                                    {{-- Judul Buku --}}
                                    <td class="border border-gray-300 p-2">
                                        {{ $p->buku->judul ?? '-' }}
                                    </td>

                                    {{-- Tanggal Pinjam --}}
                                    <td class="border border-gray-300 p-2 text-center">
                                        {{ $p->tanggal_pinjam }}
                                    </td>

                                    {{-- Tanggal Kembali --}}
                                    <td class="border border-gray-300 p-2 text-center">
                                        {{ $p->tanggal_kembali }}
                                    </td>

                                    {{-- Status --}}
                                    <td class="border border-gray-300 p-2 text-center">
                                        <span class="px-2 py-1 rounded text-xs font-semibold
                                            {{ $p->status === 'dipinjam'
                                                ? 'bg-amber-100 text-amber-700'
                                                : 'bg-green-100 text-green-700' }}">

                                            {{ ucfirst($p->status) }}

                                        </span>
                                    </td>

                                    {{-- Aksi --}}
                                    <td class="border border-gray-300 p-2 text-center">

                                        {{-- Tombol Kembalikan --}}
                                        @if($p->status === 'dipinjam')

                                            <form
                                                action="{{ route('admin.peminjaman.kembali', $p->id) }}"
                                                method="POST"
                                                class="inline-block mb-1">

                                                @csrf
                                                @method('PATCH')

                                                <button
                                                    type="submit"
                                                    class="bg-blue-600 hover:bg-blue-700 text-white font-medium px-3 py-1 rounded text-sm shadow">

                                                    Kembalikan

                                                </button>

                                            </form>

                                        @endif

                                        {{-- Tombol Hapus --}}
                                        <form
                                            action="{{ route('admin.peminjaman.destroy', $p->id) }}"
                                            method="POST"
                                            class="inline-block"
                                            onsubmit="return confirm('Yakin hapus data transaksi ini?')">

                                            @csrf
                                            @method('DELETE')

                                            <button
                                                type="submit"
                                                class="bg-rose-600 hover:bg-rose-700 text-white font-medium px-3 py-1 rounded text-sm shadow">

                                                Hapus

                                            </button>

                                        </form>

                                    </td>

                                </tr>

                            @empty

                                <tr>
                                    <td
                                        colspan="7"
                                        class="border border-gray-300 p-4 text-center text-gray-500">

                                        Belum ada transaksi peminjaman.

                                    </td>
                                </tr>

                            @endforelse
                        </tbody>

                    </table>
                </div>

            </div>

        </div>
    </div>
</x-app-layout>