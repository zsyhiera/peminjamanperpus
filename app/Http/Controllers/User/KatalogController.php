<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Buku;
use App\Models\Peminjaman;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class KatalogController extends Controller
{
    public function index(): View
    {
        $userId = auth()->id();

        $bukus = Buku::query()
            ->where('stok', '>', 0)
            ->orderBy('judul')
            ->get();

        $riwayat = Peminjaman::with('buku')
            ->where('user_id', $userId)
            ->latest('tanggal_pinjam')
            ->get();

        return view('dashboard', compact('bukus', 'riwayat'));
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'buku_id'         => ['required', 'exists:bukus,id'],
            'tanggal_kembali' => ['required', 'date', 'after:today'],
        ]);

        $userId = auth()->id();

        return DB::transaction(function () use ($validated, $userId) {
            $buku = Buku::lockForUpdate()->findOrFail($validated['buku_id']);

            if ($buku->stok <= 0) {
                return back()->with('error', 'Maaf, stok buku ini sedang kosong.');
            }

            Peminjaman::create([
                'user_id'         => $userId,
                'buku_id'         => $buku->id,
                'tanggal_pinjam'  => Carbon::today()->toDateString(),
                'tanggal_kembali' => $validated['tanggal_kembali'],
                'status'          => 'dipinjam',
            ]);

            $buku->decrement('stok');

            return redirect()
                ->route('dashboard')
                ->with('success', 'Berhasil meminjam buku. Silakan ambil buku di perpustakaan.');
        });
    }

    public function kembali(Peminjaman $peminjaman): RedirectResponse
    {
        if ($peminjaman->user_id !== auth()->id()) {
            abort(403);
        }

        return DB::transaction(function () use ($peminjaman) {
            if ($peminjaman->status !== 'dipinjam') {
                return back()->with('error', 'Buku sudah dikembalikan.');
            }

            $peminjaman->update(['status' => 'dikembalikan']);
            $peminjaman->buku()->increment('stok');

            return back()->with('success', 'Buku berhasil dikembalikan.');
        });
    }
}