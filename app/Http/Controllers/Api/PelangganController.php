<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Pelanggan;
use Illuminate\Http\Request;

class PelangganController extends Controller
{
    public function index()
    {
        return response()->json(Pelanggan::all(), 200);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'id_pelanggan' => 'required|unique:pelanggans',
            'nama_lengkap' => 'required',
            'no_hp' => 'required',
            'alamat' => 'required',
            'pekerjaan' => 'required',
        ]);

        $pelanggan = Pelanggan::create($validated);
        return response()->json(['message' => 'Data pelanggan berhasil disimpan', 'data' => $pelanggan], 201);
    }
}