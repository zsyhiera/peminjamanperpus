<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Kelola Buku') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            {{-- Notifikasi --}}
            @if (session('success'))
                <div class="mb-6 bg-green-100 border border-green-300 text-green-700 px-4 py-3 rounded-lg">
                    {{ session('success') }}
                </div>
            @endif

            @if (session('error'))
                <div class="mb-6 bg-red-100 border border-red-300 text-red-700 px-4 py-3 rounded-lg">
                    {{ session('error') }}
                </div>
            @endif

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">

                {{-- Judul dan Tombol Tambah --}}
                <div class="flex items-center justify-between mb-6">

                    <div>
                        <h3 class="text-lg font-semibold text-gray-800">
                            📚 Daftar Buku
                        </h3>

                        <p class="text-sm text-gray-500 mt-1">
                            Kelola data buku perpustakaan.
                        </p>
                    </div>

                    <a
                        href="{{ route('admin.buku.create') }}"
                        style="background-color: #2563eb; color: white; padding: 10px 16px; border-radius: 6px; text-decoration: none;"
                    >
                        + Tambah Buku
                    </a>

                </div>

                {{-- Tabel Buku --}}
                <div class="overflow-x-auto">

                    <table class="w-full border-collapse border border-gray-300">

                        <thead>
                            <tr class="bg-gray-200 text-gray-700">

                                <th class="border border-gray-300 p-3 text-center">
                                    No
                                </th>

                                <th class="border border-gray-300 p-3">
                                    Kode Buku
                                </th>

                                <th class="border border-gray-300 p-3">
                                    Judul Buku
                                </th>

                                <th class="border border-gray-300 p-3">
                                    Pengarang
                                </th>

                                <th class="border border-gray-300 p-3">
                                    Penerbit
                                </th>

                                <th class="border border-gray-300 p-3 text-center">
                                    Stok
                                </th>

                                <th class="border border-gray-300 p-3 text-center">
                                    Aksi
                                </th>

                            </tr>
                        </thead>

                        <tbody>

                            @forelse ($bukus as $index => $buku)

                                <tr class="hover:bg-gray-50">

                                    <td class="border border-gray-300 p-3 text-center">
                                        {{ $index + 1 }}
                                    </td>

                                    <td class="border border-gray-300 p-3">
                                        {{ $buku->kode_buku }}
                                    </td>

                                    <td class="border border-gray-300 p-3">
                                        {{ $buku->judul }}
                                    </td>

                                    <td class="border border-gray-300 p-3">
                                        {{ $buku->pengarang }}
                                    </td>

                                    <td class="border border-gray-300 p-3">
                                        {{ $buku->penerbit }}
                                    </td>

                                    <td class="border border-gray-300 p-3 text-center">
                                        {{ $buku->stok }}
                                    </td>

                                    <td class="border border-gray-300 p-3 text-center">

                                        <div class="flex justify-center gap-2">

                                            {{-- Edit --}}
                                            <a
                                                href="{{ route('admin.buku.edit', $buku->id) }}"
                                                style="background-color: #f59e0b; color: white; padding: 6px 10px; border-radius: 5px; text-decoration: none;"
                                            >
                                                Edit
                                            </a>

                                            {{-- Hapus --}}
                                            <form
                                                action="{{ route('admin.buku.destroy', $buku->id) }}"
                                                method="POST"
                                                onsubmit="return confirm('Yakin ingin menghapus buku ini?')"
                                            >
                                                @csrf
                                                @method('DELETE')

                                                <button
                                                    type="submit"
                                                    style="background-color: #dc2626; color: white; padding: 6px 10px; border-radius: 5px; border: none; cursor: pointer;"
                                                >
                                                    Hapus
                                                </button>

                                            </form>

                                        </div>

                                    </td>

                                </tr>

                            @empty

                                <tr>

                                    <td
                                        colspan="7"
                                        class="border border-gray-300 p-6 text-center text-gray-500"
                                    >
                                        Belum ada data buku.
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