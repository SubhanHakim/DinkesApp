<?php

namespace App\Http\Controllers;

use App\Models\Achievement;
use App\Models\Bidang;
use App\Models\MonthlyAchievement;
use Illuminate\Http\Request;


class AchievementController extends Controller
{
    public function create()
    {
        return view('admin.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'bidang' => 'required|string|max:255',
            'seksi' => 'required|string|max:255',
            'program' => 'required|string|max:255',
            'target_kinerja' => 'required|string|max:255',
            'target_capaian' => 'required|numeric|min:0|max:100',
        ]);

        Achievement::create([
            'bidang' => $request->bidang,
            'seksi' => $request->seksi,
            'program' => $request->program,
            'target_kinerja' => $request->target_kinerja,
            'target_capaian' => $request->target_capaian,
        ]);

        return redirect()->route('achievements.create')->with('success', 'Achievement added successfully.');
    }

    public function bidangIndex()
    {
        $bidangs = Bidang::all();
        return view('achievements.bidangIndex', compact('bidangs'));
    }

    public function bidangEdit(Achievement $achievement)
    {
        return view('achievements.bidangEdit', compact('achievement'));
    }

    public function bidangUpdate(Request $request, Achievement $achievement)
    {
        $request->validate([
            'capaian_kinerja_tahunan' => 'required|integer',
        ]);

        $achievement->update([
            'capaian_kinerja_tahunan' => $request->capaian_kinerja_tahunan,
            'capaian_kinerja_tahunan_percent' => ($request->capaian_kinerja_tahunan / $achievement->target_capaian) * 100,
            'keterangan' => $request->capaian_kinerja_tahunan >= $achievement->target_capaian ? 'Target tercapai' : 'Target tidak tercapai',
        ]);

        return redirect()->route('achievements.bidangIndex')->with('success', 'Achievement updated successfully.');
    }

    public function edit($id)
    {
        $achievement = MonthlyAchievement::findOrFail($id);
        return view('achievements.edit', compact('achievement'));
    }

    public function update(Request $request, $id)
    {
        $achievement = MonthlyAchievement::findOrFail($id);
        $achievement->capaian_kinerja_bulanan = $request->input('capaian_kinerja_bulanan');

        $achievement->save();

        return redirect()->route('achievements.index')->with('success', 'Data berhasil diperbarui!');
    }
}
