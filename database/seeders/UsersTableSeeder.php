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
            'name' => 'Admin User',
            'email' => 'admin@example.com',
            'password' => Hash::make('password'),
            'role' => 'admin',
            'nama_depan' => 'Admin',
            'nama_belakang' => 'User',
            'nip' => '1234567890',
            'phone_number' => '081234567890',
            'bidang' => 'p2p',
            'program' => 'Program Admin',
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
