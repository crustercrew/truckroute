<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class armadas extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_sopir',
        'status',
        'no_pol',
        'no_lambung',
        'jenis_kendaraan',
        'tahun'
    ];
}
