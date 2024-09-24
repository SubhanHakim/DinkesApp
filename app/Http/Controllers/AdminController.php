<?php

namespace App\Http\Controllers;

use App\Enums\Role;
use App\Models\Bidang;
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
        $users = User::all();
        $bidang = $request->input('bidang');
        if ($bidang) {
            $allPegawai = User::where('bidang', $bidang)->get();
        } else {
            $allPegawai = User::all();
        }
        $pegawaiCount = $allPegawai->count(); // Menambahkan variabel untuk menghitung jumlah pegawai
        return view('admin.users.dataPegawai', compact('allPegawai', 'users', 'pegawaiCount', 'bidang',));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'bidang' => 'required',
            'seksi' => 'required',
            'program' => 'required',
            'target_kinerja' => 'required|numeric',
            'target_capaian' => 'required|numeric',
        ]);

        $bidang = Bidang::findOrFail($id);
        $bidang->update($request->all());

        return redirect()->route('admin.index')->with('success', 'Data Bidang berhasil diperbarui.');
    }

    public function edit($id)
    {
        $bidang = Bidang::findOrFail($id);
        return view('admin.edit', compact('bidang'));
    }

    public function filterByBidang(Request $request)
    {
        $bidang = $request->input('bidang');
        $allPegawai = User::where('bidang', $bidang)->get();
        return view('admin.users.dataPegawai', compact('allPegawai'));
    }

    public function destroy($id)
    {
        $bidang = Bidang::findOrFail($id);
        $bidang->delete();

        return redirect()->route('admin.index')->with('success', 'Data Bidang berhasil dihapus.');
    }

    public function destroyUser($id)
    {
        $users = User::findOrFail($id);

        $users->delete();

        return redirect()->route('admin.users.dataPegawai',)->with('success', "User Berhasil Dihapus");
    }

    public function editUser($id)
    {
        $user = User::findOrFail($id);


        return view('admin.users.edit', compact('user'));
    }

    public function updateUser(Request $request, $id)
    {
        // Cari user berdasarkan ID
        $user = User::findOrFail($id);

        // Validasi data input
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => [
                'nullable',
                'string',
                'email',
                'max:255',
                Rule::unique('users')->ignore($id),
            ],
            'password' => [
                'nullable', // Password boleh kosong jika tidak diubah
                'string',
                'min:8',    // Minimal 8 karakter jika diisi
            ],
            'role' => 'required|string|in:admin,bidang,kadis', // Memastikan role valid
            'nama_depan' => 'required|string|max:255',
            'nama_belakang' => 'required|string|max:255',
            'nip' => 'required|string|max:255',
            'phone_number' => 'required|string|max:255',
            'program' => $user->role === 'kadis' ? 'nullable|string|max:255' : 'required|string|max:255',
            'bidang' => $user->role === 'kadis' ? 'nullable|string|max:255' : 'required|string|max:255',
        ]);

        // Update data user
        $user->name = $request->input('name');
        if ($request->filled('email')) {
            $user->email = $request->input('email');
        }
        if ($request->filled('password')) {
            $user->password = bcrypt($request->input('password')); // Hash password baru
        }
        $user->role = $request->input('role');
        $user->nama_depan = $request->input('nama_depan');
        $user->nama_belakang = $request->input('nama_belakang');
        $user->nip = $request->input('nip');
        $user->phone_number = $request->input('phone_number');

        // Update program dan bidang hanya jika role bukan 'kadis'
        if ($user->role !== 'kadis') {
            $user->program = $request->input('program');
            $user->bidang = $request->input('bidang');
        } else {
            // Jika role kadis, set program dan bidang ke null
            $user->program = null;
            $user->bidang = null;
        }

        $user->save();

        // Redirect ke halaman daftar user dengan pesan sukses
        return redirect()->route('admin.users.dataPegawai')->with('success', 'User berhasil diperbarui');
    }
}
