<?php

namespace App\Http\Controllers;

use App\Models\Skpd;
use Illuminate\Http\Request;

class SkpdController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $skpds = Skpd::all();
        return response()->json([
            'message' => 'Daftar SKPD',
            'data' => $skpds
        ], 200);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'nama' => 'required|string|max:255',
            'alamat' => 'nullable|string',
        ]);

        $skpd = Skpd::create($data);

        return response()->json([
            'message' => 'SKPD berhasil ditambahkan',
            'data' => $skpd
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Skpd $skpd)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Skpd $skpd)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Skpd $skpd)
    {
        //
        if (!$skpd) {
            return response()->json([
                'message' => 'SKPD tidak ditemukan'
            ], 404);
        }

        $data = $request->validate([
            'nama' => 'required|string|max:255',
            'alamat' => 'nullable|string',
        ]);
        $skpd->update($data);

        return response()->json([
            'message' => 'SKPD berhasil diperbarui',
            'data' => $skpd
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Skpd $skpd)
    {
        //
    }
}
