<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Kegiatan extends Model
{
    use HasFactory;
    protected $fillable = [
        'nama_kegiatan',
        'lokasi',
        'pagu_anggaran',
        'status',
        'pengusul_id',
    ];

    public function pengusul()
    {
        return $this->belongsTo((User::class), 'pengusul_id');
    }
}
