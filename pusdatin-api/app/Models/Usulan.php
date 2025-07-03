<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Usulan extends Model
{
    use HasFactory;

    protected $fillable = [
        'judul',
        'deskripsi',
        'pengusul',
        'kode_wilayah',
        'latitude',
        'longitude',
        'skpd_id',
        'periode_id',
        'status_usulan_id'
    ];

    public function skpd()
    {
        return $this->belongsTo(Skpd::class);
    }

    public function status()
    {
        return $this->belongsTo(StatusUsulan::class);
    }

    public function periode()
    {
        return $this->belongsTo(Periode::class);
    }
}
