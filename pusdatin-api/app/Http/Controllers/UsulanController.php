<?php

namespace App\Http\Controllers;

use App\Models\Usulan;
use Illuminate\Http\Request;

class UsulanController extends Controller
{
    public function index()
    {
        $usulan = Usulan::with(['skpd', 'status', 'periode'])->get();

        return response()->json($usulan);
    }

    public function show($id)
    {
        $usulan = Usulan::with(['skpd', 'status', 'periode'])->findOrFail($id);

        return response()->json($usulan);
    }

    public function update(Request $request, $id)
    {
        $usulan = Usulan::findOrFail($id);

        $validated = $request->validate([
            'judul' => 'sometimes|required|string|max:255',
            'deskripsi' => 'sometimes|required|string',
            'pengusul' => 'sometimes|required|string|max:255',
            'kode_wilayah' => 'sometimes|required|string|max:10',
            'latitude' => 'sometimes|required|numeric',
            'longitude' => 'sometimes|required|numeric',
            'skpd_id' => 'sometimes|required|exists:skpds,id',
            'periode_id' => 'sometimes|required|exists:periodes,id',
            'status_usulan_id' => 'sometimes|required|exists:status_usulans,id',
        ]);

        $usulan->update($validated);

        return response()->json($usulan);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'judul' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'pengusul' => 'required|string|max:255',
            'kode_wilayah' => 'required|string|max:10',
            'latitude' => 'required|numeric',
            'longitude' => 'required|numeric',
            'skpd_id' => 'required|exists:skpds,id',
            'periode_id' => 'required|exists:periodes,id',
            'status_usulan_id' => 'required|exists:status_usulans,id',
        ]);

        $usulan = Usulan::create($validated);

        return response()->json($usulan, 201);
    }
}
