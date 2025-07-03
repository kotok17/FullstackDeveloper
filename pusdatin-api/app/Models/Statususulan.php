<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Statususulan extends Model
{
    use HasFactory;
    protected $table = 'status_usulans';
    protected $fillable = [
        'nama',
    ];
}
