<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PembayaranService extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_servis_pelanggan',
        'jumlah_biaya_service',
        'jenis_pembayaran',
        'keterangan',
    ];
}