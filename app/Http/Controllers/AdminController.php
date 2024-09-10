<?php

namespace App\Http\Controllers;

use App\Enums\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class AdminController extends Controller
{
    public function index()
    {
        $userCount = User::count();
        $totalp2p = User::where('bidang', 'p2p')->count();
        $totalsdk = User::where('bidang', 'sdk')->count();
        $totalkesmas = User::where('bidang', 'kesmas')->count();
        $totalyankes = User::where('bidang', 'yankes')->count();
        return view('admin.dashboard', compact('userCount', 'totalp2p', 'totalsdk', 'totalkesmas', 'totalyankes'));
    }

    public function create()
    {
        $roles = Role::cases();
        return view('admin.users.create', compact('roles'));
    }

    public function store(Request $request)
    {
        $rules = [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'role' => ['required', 'string', Rule::in(['admin', 'bidang', 'kadis'])],
            'nama_depan' => 'required|string|max:255',
            'nama_belakang' => 'required|string|max:255',
            'nip' => 'required|string|max:255',
            'phone_number' => 'required|string|max:255',
            'program' => 'required|string|max:255',
        ];

        if ($request->role !== 'kadis') {
            $rules['bidang'] = ['required', 'string', Rule::in(['p2p', 'sdk', 'kesmas', 'yankes'])];
        } else {
            unset($rules['program']);
        }

        $request->validate($rules);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => $request->role,
            'nama_depan' => $request->nama_depan,
            'nama_belakang' => $request->nama_belakang,
            'nip' => $request->nip,
            'phone_number' => $request->phone_number,
            'bidang' => $request->role === 'kadis' ? null : $request->bidang,
            'program' => $request->role === 'kadis' ? null : $request->program,
        ]);
        return redirect()->route('admin.dashboard')->with('success', 'User created successfully.');
    }

    public function showAll(Request $request)
    {
        $bidang = $request->input('bidang');
        if ($bidang) {
            $allPegawai = User::where('bidang', $bidang)->get();
        } else {
            $allPegawai = User::all();
        }
        $pegawaiCount = $allPegawai->count(); // Menambahkan variabel untuk menghitung jumlah pegawai
        return view('admin.users.dataPegawai', compact('allPegawai', 'pegawaiCount', 'bidang'));
    }

    public function filterByBidang(Request $request)
    {
        $bidang = $request->input('bidang');
        $allPegawai = User::where('bidang', $bidang)->get();
        return view('admin.users.dataPegawai', compact('allPegawai'));
    }
}
