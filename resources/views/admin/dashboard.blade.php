<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard Admin Perpustakaan') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            {{-- Selamat Datang --}}
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mb-6">
                <div class="p-6 text-gray-900">

                    <h3 class="text-2xl font-semibold mb-3">
                        Selamat Datang, Admin!
                    </h3>

                    <p class="text-gray-600 mb-6">
                        Gunakan menu di bawah untuk mengelola data perpustakaan.
                    </p>

                    {{-- Tombol Menu --}}
                    <div class="flex gap-4">

                        {{-- Kelola Buku --}}
                        <a href="{{ route('admin.buku.index') }}" 
                           style="background-color: #2563eb; color: white;"
                           class="inline-flex items-center px-5 py-3
                                  bg-gray-600 text-white rounded-lg font-semibold">

                            📚
                            <span class="ml-2">
                                Kelola Buku
                            </span>

                        </a>

                        {{-- Kelola User --}}
                        <a href="{{route('admin.user.index')}}"
                           style="background-color: #16a34a; color: white;"
                           class="inline-flex items-center px-5 py-3
                                  bg-gray-600 text-white rounded-lg font-semibold">

                            👥
                            <span class="ml-2">
                                Kelola User
                            </span>

                        </a>

                    </div>

                </div>
            </div>

        </div>
    </div>

</x-app-layout>