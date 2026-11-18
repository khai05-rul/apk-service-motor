<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DaftarService extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_servis_pelanggan',
        'no_plat_kendaraan',
        'id_pelanggan',
        'nama_lengkap',
        'keluhan_kendaraan',
        'tanggal_servis',
    ];
}