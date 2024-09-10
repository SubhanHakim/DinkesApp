<?php

namespace App\Http\Controllers;

use App\Models\Bidang;
use App\Models\Chat;
use App\Models\MonthlyAchievement;
use App\Models\User;
use Illuminate\Http\Request;

class KadisController extends Controller
{
    public function index()
    {
        $bidangs = ['P2P', 'SKD', 'Yankes', 'Kesmas'];
        $data = [];

        foreach ($bidangs as $bidang) {
            $selesai = Bidang::where('bidang', $bidang)
                ->where('keterangan', 'Target tercapai')
                ->count();

            $belumSelesai = Bidang::where('bidang', $bidang)
                ->where('keterangan', '!=', 'Target tercapai')
                ->count();

            $data[] = [
                'bidang' => $bidang,
                'selesai' => $selesai,
                'belumSelesai' => $belumSelesai,
            ];
        }

        return view('kadis.dashboard', compact('data'));
    }

    public function dataBidang()
    {
        $bidangs = Bidang::all();
        return view('kadis.dataBidang', compact('bidangs'));
    }

    public function viewMonthly(Bidang $bidang)
    {
        $achievements = MonthlyAchievement::where('bidang_id', $bidang->id)->get();
        return view('kadis.viewMonthly', compact('bidang', 'achievements'));
    }

    public function inbox()
    {
        $chats = Chat::where('to_user_id', auth()->user()->id)->get();
        return view('kadis.inbox', compact('chats'));
    }
}
