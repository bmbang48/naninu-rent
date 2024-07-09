<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = [
        'car_id',
        'nopol',
        'invoice',
        'nama_pelanggan',
        'ktp',
        'telp',
        'alamat',
        'catatan',
        'layanan',
        'tujuan',
        'mulai_sewa',
        'selesai_sewa',
        'lama_sewa',
        'total_harga',
        'snap_token'
    ];
}
