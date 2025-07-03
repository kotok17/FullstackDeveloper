<?php

namespace App\Http\Controllers;

use App\Models\Kegiatan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class KegiatanController extends Controller
{
    //

    public function index()
    {
        return Kegiatan::with('pengusul')
            ->orderBy('created_at', 'desc')
            ->get();
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_kegiatan' => 'required|string|max:255',
            'lokasi' => 'required|string',
            'pagu_anggaran' => 'required|numeric|min:0',
            'status' => 'required|in:draft,disetujui,ditolak'
        ]);

        $validated['pengusul_id'] = Auth::id();

        $kegiatan = Kegiatan::create($validated);

        return response()->json([
            'message' => 'Kegiatan berhasil dibuat',
            'kegiatan' => $kegiatan
        ], 201);
    }

    public function update(Request $request, Kegiatan $kegiatan)
    {

        $kegiatan = Kegiatan::findOrFail($kegiatan->id);
        // Pastikan pengguna memiliki izin untuk mengupdate kegiatan
        if (Auth::id() !== $kegiatan->pengusul_id) {
            return response()->json(['message' => 'Unauthorized'], 403);
        }

        $data = $request->validate([
            'nama_kegiatan' => 'sometimes|required|string|max:255',
            'lokasi' => 'sometimes|required|string',
            'pagu_anggaran' => 'sometimes|required|numeric|min:10000',
            'status' => 'sometimes|required|in:draft,disetujui,ditolak'
        ]);

        $kegiatan->update($data);

        return response()->json([
            'message' => 'Kegiatan berhasil diperbarui',
            'kegiatan' => $kegiatan
        ]);
    }

    public function destroy(Kegiatan $kegiatan)
    {
        $kegiatan = Kegiatan::findOrFail($kegiatan->id);
        if (Auth::id() !== $kegiatan->pengusul_id) {
            return response()->json(['message' => 'Unauthorized'], 403);
        }

        $kegiatan->delete();

        return response()->json(['message' => 'Kegiatan berhasil dihapus']);
    }

    public function approve(Kegiatan $kegiatan)
    {
        if (Auth::user()->role !== 'admin') {
            return response()->json(['message' => 'Unauthorized'], 403);
        }
        $kegiatan->status = 'disetujui';
        $kegiatan->save();
    }

    public function reject(Kegiatan $kegiatan)
    {
        if (Auth::user()->role !== 'admin') {
            return response()->json(['message' => 'Unauthorized'], 403);
        }
        $kegiatan->status = 'ditolak';
        $kegiatan->save();
    }
}
