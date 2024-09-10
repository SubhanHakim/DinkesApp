<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MonthlyAchievement extends Model
{
    use HasFactory;
    protected $fillable = [
        'bidang_id',
        'bulan',
        'target_capaian_bulanan',
        'capaian_kinerja_bulanan',
        'percent_capaian_kinerja_bulanan',
        'keterangan'
    ];


    public function bidang()
    {
        return $this->belongsTo(Bidang::class);
    }
}
