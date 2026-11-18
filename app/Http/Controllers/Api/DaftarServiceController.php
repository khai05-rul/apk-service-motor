<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\DaftarService;
use Illuminate\Http\Request;

class DaftarServiceController extends Controller
{
    public function index()
    {
        return response()->json(DaftarService::all(), 200);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'id_servis_pelanggan' => 'required|unique:daftar_services',
            'no_plat_kendaraan' => 'required',
            'id_pelanggan' => 'required',
            'nama_lengkap' => 'required',
            'keluhan_kendaraan' => 'required',
            'tanggal_servis' => 'required|date',
        ]);

        $daftarService = DaftarService::create($validated);
        return response()->json(['message' => 'Daftar service berhasil disimpan', 'data' => $daftarService], 201);
    }

    public function show($id)
    {
        $daftarService = DaftarService::find($id);
        if (!$daftarService) {
            return response()->json(['message' => 'Data daftar service tidak ditemukan'], 404);
        }
        return response()->json($daftarService, 200);
    }

    public function update(Request $request, $id)
    {
        $daftarService = DaftarService::find($id);
        if (!$daftarService) {
            return response()->json(['message' => 'Data daftar service tidak ditemukan'], 404);
        }

        $daftarService->update($request->all());
        return response()->json(['message' => 'Data daftar service berhasil diperbarui', 'data' => $daftarService], 200);
    }

    public function destroy($id)
    {
        $daftarService = DaftarService::find($id);
        if (!$daftarService) {
            return response()->json(['message' => 'Data daftar service tidak ditemukan'], 404);
        }

        $daftarService->delete();
        return response()->json(['message' => 'Data daftar service berhasil dihapus'], 200);
    }
}