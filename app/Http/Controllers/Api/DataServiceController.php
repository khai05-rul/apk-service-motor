<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\DataService;
use Illuminate\Http\Request;

class DataServiceController extends Controller
{
    public function index()
    {
        return response()->json(DataService::all(), 200);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'id_servis_pelanggan' => 'required',
            'keluhan_kendaraan' => 'required',
            'estimasi_service' => 'required',
            'nama_mekanik' => 'required',
            'sparepart_pengganti' => 'required',
        ]);

        $dataService = DataService::create($validated);
        return response()->json(['message' => 'Data service berhasil disimpan', 'data' => $dataService], 201);
    }

    public function show($id)
    {
        $dataService = DataService::find($id);
        if (!$dataService) {
            return response()->json(['message' => 'Data service tidak ditemukan'], 404);
        }
        return response()->json($dataService, 200);
    }

    public function update(Request $request, $id)
    {
        $dataService = DataService::find($id);
        if (!$dataService) {
            return response()->json(['message' => 'Data service tidak ditemukan'], 404);
        }

        $dataService->update($request->all());
        return response()->json(['message' => 'Data service berhasil diperbarui', 'data' => $dataService], 200);
    }

    public function destroy($id)
    {
        $dataService = DataService::find($id);
        if (!$dataService) {
            return response()->json(['message' => 'Data service tidak ditemukan'], 404);
        }

        $dataService->delete();
        return response()->json(['message' => 'Data service berhasil dihapus'], 200);
    }
}