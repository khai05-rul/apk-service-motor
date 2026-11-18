<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Kendaraan;
use Illuminate\Http\Request;

class KendaraanController extends Controller
{
    public function index()
    {
        return response()->json(Kendaraan::all(), 200);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'no_plat_kendaraan' => 'required|unique:kendaraans',
            'jenis_kendaraan' => 'required|in:Matic,Manual Transmisi',
            'no_stnk' => 'required',
            'tahun_pembuatan' => 'required|digits:4',
            'nama_pemilik' => 'required',
            'warna_kendaraan' => 'required',
        ]);

        $kendaraan = Kendaraan::create($validated);
        return response()->json(['message' => 'Data kendaraan berhasil disimpan', 'data' => $kendaraan], 201);
    }

    public function show($id)
    {
        $kendaraan = Kendaraan::find($id);
        if (!$kendaraan) {
            return response()->json(['message' => 'Data kendaraan tidak ditemukan'], 404);
        }
        return response()->json($kendaraan, 200);
    }

    public function update(Request $request, $id)
    {
        $kendaraan = Kendaraan::find($id);
        if (!$kendaraan) {
            return response()->json(['message' => 'Data kendaraan tidak ditemukan'], 404);
        }

        $kendaraan->update($request->all());
        return response()->json(['message' => 'Data kendaraan berhasil diperbarui', 'data' => $kendaraan], 200);
    }

    public function destroy($id)
    {
        $kendaraan = Kendaraan::find($id);
        if (!$kendaraan) {
            return response()->json(['message' => 'Data kendaraan tidak ditemukan'], 404);
        }

        $kendaraan->delete();
        return response()->json(['message' => 'Data kendaraan berhasil dihapus'], 200);
    }
}