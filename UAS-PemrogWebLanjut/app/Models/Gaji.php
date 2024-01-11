<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gaji extends Model
{
    use HasFactory;
    protected $table = 'gaji';
    protected $fillable = ['nama', 'jabatan', 'bulan', 'tahun', 'total_hadir', 'total_gaji', 'status'];
}
