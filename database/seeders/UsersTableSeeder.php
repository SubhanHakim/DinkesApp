<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        User::create([
            'name' => 'apt. Iyus Kusnandar, S.Si',
            'email' => 'iyuskusnandar23984ke2@gmail.com',
            'password' => Hash::make('p2p2024'),
            'role' => 'bidang',
            'nama_depan' => 'PTM',
            'nama_belakang' => '- IYUS',
            'nip' => '-198409232024211001', 
            'phone_number' => '+82118182408', 
            'bidang' => 'P2P',
            'program' => 'Kanker dan Kelainan Darah',
        ]);

        User::create([
            'name' => 'Bidang User',
            'email' => 'bidang@example.com',
            'password' => Hash::make('password'),
            'role' => 'bidang',
            'nama_depan' => 'Bidang',
            'nama_belakang' => 'User',
            'nip' => '0987654321',
            'phone_number' => '089876543210',
            'bidang' => 'sdk',
            'program' => 'Program Bidang',
        ]);
    }
}
