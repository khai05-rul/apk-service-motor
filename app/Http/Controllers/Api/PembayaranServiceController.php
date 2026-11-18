<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\PembayaranService;
use Illuminate\Http\Request;

class PembayaranServiceController extends Controller
{
    public function index()
    {
        return response()->json(PembayaranService::all(), 200);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'id_servis_pelanggan' => 'required',
            'jumlah_biaya_service' => 'required|numeric',
            'jenis_pembayaran' => 'required|in:Cash / Tunai,Non Tunai',
            'keterangan' => 'nullable',
        ]);

        $pembayaranService = PembayaranService::create($validated);
        return response()->json(['message' => 'Data pembayaran service berhasil disimpan', 'data' => $pembayaranService], 201);
    }

    public function show($id)
    {
        $pembayaranService = PembayaranService::find($id);
        if (!$pembayaranService) {
            return response()->json(['message' => 'Data pembayaran tidak ditemukan'], 404);
        }
        return response()->json($pembayaranService, 200);
    }

    public function update(Request $request, $id)
    {
        $pembayaranService = PembayaranService::find($id);
        if (!$pembayaranService) {
            return response()->json(['message' => 'Data pembayaran tidak ditemukan'], 404);
        }

        $pembayaranService->update($request->all());
        return response()->json(['message' => 'Data pembayaran berhasil diperbarui', 'data' => $pembayaranService], 200);
    }

    public function destroy($id)
    {
        $pembayaranService = PembayaranService::find($id);
        if (!$pembayaranService) {
            return response()->json(['message' => 'Data pembayaran tidak ditemukan'], 404);
        }

        $pembayaranService->delete();
        return response()->json(['message' => 'Data pembayaran berhasil dihapus'], 200);
    }
}