<?php

namespace App\Http\Controllers;

use App\Models\Bidang;
use App\Models\MonthlyAchievement;
use App\Models\User;
use Illuminate\Http\Request;

class BidangController extends Controller
{
    public function index()
    {
        $bidangs = Bidang::all();
        $jumlahBidang = Bidang::count();
        return view('admin.index', compact('bidangs', 'jumlahBidang'));
    }

    public function create()
    {
        $listBidang = ['p2p', 'sdk', 'kesmas', 'yankes'];
        return view('admin.create', compact('listBidang'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'bidang' => 'required|string|in:p2p,sdk,kesmas,yankes',
            'seksi' => 'required|string|max:255',
            'program' => 'required|string|max:255',
            'target_kinerja' => 'required|string|max:255',
            'target_capaian' => 'required|integer',
            'target_capaian_percent' => 'required|numeric',
        ]);

        Bidang::create($request->all());

        return redirect()->route('admin.index')->with('success', 'Bidang added successfully.');
    }

    public function edit($id)
    {
        // Cari bidang berdasarkan ID
        $bidang = Bidang::findOrFail($id);

        // Tampilkan view untuk edit data bidang
        return view('admin.edit', compact('bidang'));
    }

    public function update(Request $request, Bidang $achievement)
    {
        $request->validate([
            'capaian_kinerja_tahunan' => 'required|integer',
        ]);

        $achievement->update([
            'capaian_kinerja_tahunan' => $request->capaian_kinerja_tahunan,
            'capaian_kinerja_tahunan_percent' => ($request->capaian_kinerja_tahunan / $achievement->target_capaian) * 100,
            'keterangan' => $request->capaian_kinerja_tahunan >= $achievement->target_capaian ? 'Target tercapai' : 'Target tidak tercapai',
        ]);

        return redirect()->route('achievements.index')->with('success', 'Achievement updated successfully.');
    }

    public function bidangIndex(Request $request)
    {
        $jumlahBidang = Bidang::count();
        $bidangs = Bidang::all();
        $query = Bidang::query();

        if ($request->has('search')) {
            $search = $request->input('search');
            $query->where('bidang', 'LIKE', "%{$search}%")
                ->orWhere('seksi', 'LIKE', "%{$search}%")
                ->orWhere('program', 'LIKE', "%{$search}%");
        }

        if ($request->has('year')) {
            $year = $request->input('year');
            // Asumsikan bahwa Anda memiliki kolom 'year' di tabel Bidang
            $query->whereYear('created_at', $year);
        }

        $bidangs = $query->get();

        return view('achievements.bidangIndex', compact('bidangs', 'jumlahBidang'));
    }

    public function bidangEdit(Bidang $achievement)
    {
        return view('achievements.bidangEdit', compact('achievement'));
    }

    public function bidangUpdate(Request $request, Bidang $achievement)
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

    public function editMonthly(Bidang $bidang)
    {
        $months = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];
        $targetCapaianBulanan = round($bidang->target_capaian / 12);

        // Ambil data bulanan berdasarkan bidang
        $achievements = MonthlyAchievement::where('bidang_id', $bidang->id)->get();

        // Jika data bulanan belum ada, buat data baru untuk setiap bulan
        if ($achievements->isEmpty()) {
            foreach ($months as $month) {
                MonthlyAchievement::create([
                    'bidang_id' => $bidang->id,
                    'bulan' => $month,
                    'target_capaian_bulanan' => $targetCapaianBulanan
                ]);
            }
            $achievements = MonthlyAchievement::where('bidang_id', $bidang->id)->get();
        }

        return view('achievements.editMonthly', compact('bidang', 'achievements', 'targetCapaianBulanan'));
    }

    public function updateMonthly(Request $request, Bidang $bidang)
    {
        // Ambil input achievements
        $achievements = $request->input('achievements');

        // Cek apakah $achievements bukan null dan merupakan array
        if (!is_array($achievements) || empty($achievements)) {
            return redirect()->back()->with('error', 'Data achievements tidak ditemukan atau tidak valid.');
        }

        $totalCapaianTahunan = 0;  // Untuk menghitung total capaian tahunan
        $totalTargetCapaianBulanan = 0;  // Untuk menghitung total target capaian bulanan

        // Update data bulanan
        foreach ($achievements as $achievementId => $data) {
            // Pastikan achievement ditemukan
            $achievement = MonthlyAchievement::find($achievementId);
            if (!$achievement) {
                continue; // Lewatkan jika achievement tidak ditemukan
            }

            // Akumulasi target capaian bulanan
            $totalTargetCapaianBulanan += $achievement->target_capaian_bulanan;

            // Update capaian kinerja bulanan
            $achievement->capaian_kinerja_bulanan = $data['capaian_kinerja_bulanan'];
            $achievement->percent_capaian_kinerja_bulanan = ($data['capaian_kinerja_bulanan'] / $achievement->target_capaian_bulanan) * 100;
            $achievement->keterangan = $achievement->capaian_kinerja_bulanan >= $achievement->target_capaian_bulanan ? 'Target tercapai' : 'Target tidak tercapai';
            $achievement->save();

            // Jumlahkan capaian bulanan ke total capaian tahunan
            $totalCapaianTahunan += $achievement->capaian_kinerja_bulanan;
        }

        // Update capaian kinerja tahunan dan persentase di tabel bidang
        $bidang->capaian_kinerja_tahunan = $totalCapaianTahunan;

        // Akumulasi target capaian bulanan ke dalam target capaian tahunan di tabel bidang
        $bidang->target_capaian = $totalTargetCapaianBulanan;

        // Perbarui persentase capaian tahunan berdasarkan target tahunan yang sudah diperbarui
        $bidang->capaian_kinerja_tahunan_percent = ($totalCapaianTahunan / $bidang->target_capaian) * 100;

        // Perbarui keterangan apakah target tahunan tercapai atau tidak
        $bidang->keterangan = $totalCapaianTahunan >= $bidang->target_capaian ? 'Target tercapai' : 'Target tidak tercapai';

        // Simpan perubahan
        $bidang->save();

        return redirect()->route('achievements.bidangIndex')->with('success', 'Achievement updated successfully.');
    }


    public function editMonthlyAchievement($id, $bidangId, $bulan)
    {
        $bidangs = Bidang::find($bidangId);
        // Temukan MonthlyAchievement berdasarkan ID
        $achievement = MonthlyAchievement::where('bidang_id', $bidangId)->where('bulan', $bulan)->firstOrFail();

        // Kembalikan view edit dengan data yang diperlukan
        return view('achievements.editMonthlyAchievement', compact('achievement', 'bidangs'));
    }

    public function updateMonthlyAchievement(Request $request, $id)
    {
        $achievement = MonthlyAchievement::findOrFail($id);

        // Validasi input dari form
        $request->validate([
            'target_capaian' => 'required|numeric',
            'capaian_kinerja_bulanan' => 'required|numeric',
        ]);

        // Update target capaian bulanan jika diperlukan
        $achievement->target_capaian_bulanan = $request->target_capaian;

        // Update capaian kinerja bulanan
        $achievement->capaian_kinerja_bulanan = $request->capaian_kinerja_bulanan;
        $achievement->percent_capaian_kinerja_bulanan = ($achievement->capaian_kinerja_bulanan / $achievement->target_capaian_bulanan) * 100;

        // Update keterangan apakah target tercapai atau tidak
        $achievement->keterangan = $achievement->capaian_kinerja_bulanan >= $achievement->target_capaian_bulanan ? 'Target tercapai' : 'Target tidak tercapai';

        // Simpan perubahan
        $achievement->save();

        // Hitung ulang total capaian tahunan
        $totalCapaianTahunan = MonthlyAchievement::where('bidang_id', $achievement->bidang_id)
            ->sum('capaian_kinerja_bulanan');

        // Update capaian kinerja tahunan di tabel bidang
        $bidang = Bidang::findOrFail($achievement->bidang_id);
        $bidang->capaian_kinerja_tahunan = $totalCapaianTahunan;
        $bidang->capaian_kinerja_tahunan_percent = ($totalCapaianTahunan / $bidang->target_capaian) * 100;
        $bidang->keterangan = $totalCapaianTahunan >= $bidang->target_capaian ? 'Target tercapai' : 'Target tidak tercapai';
        $bidang->save();

        // Redirect dengan pesan sukses
        return redirect()->route('achievements.editMonthly', $achievement->bidang_id)
            ->with('success', 'Data berhasil diperbarui');
    }



    public function updateAdmin(Request $request, $id)
    {

        // Validasi data yang diinput
        $request->validate([
            'bidang' => 'required|string',
            'seksi' => 'required|string|max:255',
            'program' => 'required|string|max:255',
            'target_kinerja' => 'required|string|max:255',
            'target_capaian' => 'required|integer',
            'target_capaian_percent' => 'required|numeric',
        ]);

        // Ambil data bidang berdasarkan ID
        $bidang = Bidang::find($id);

        // Cek apakah data bidang ditemukan
        if (!$bidang) {
            return redirect()->back()->with('error', 'Bidang tidak ditemukan.');
        }

        // Update data bidang
        $bidang->update($request->all());

        // Redirect dengan pesan sukses
        return redirect()->route('admin.index')->with('success', 'Data berhasil diupdate');
    }

    public function destroy($id)
    {
        $bidang = Bidang::findOrFail($id);
        $bidang->delete();

        return redirect()->route('admin.index')->with('success', 'Data Bidang berhasil dihapus.');
    }
}
