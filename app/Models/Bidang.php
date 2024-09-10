<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bidang extends Model
{
    use HasFactory;

    protected $fillable = [
        'bidang',
        'seksi',
        'program',
        'target_kinerja',
        'target_capaian',
        'target_capaian_percent',
        'capaian_kinerja_tahunan',
        'capaian_kinerja_tahunan_percent',
        'keterangan'
    ];

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
