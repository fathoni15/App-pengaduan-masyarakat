<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengaduan extends Model
{
    use HasFactory;

    protected $fillable = [
        'nik',
        'tgl_kejadian',
        'isi_laporan',
        'foto',
        'status',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'nik', 'nik');
    }

    public function tanggapan()
    {
        return $this->belongsTo(Tanggapan::class, 'id', 'id_pengaduan');
    }
}
