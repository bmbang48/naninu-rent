<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Confirm_order extends Model
{
    use HasFactory;
    protected $fillable = [
        'order_id',
        'bayar',
        'bukti_bayar',
        'keterangan',
        'created_at',
        'updated_at'
    ];
}
