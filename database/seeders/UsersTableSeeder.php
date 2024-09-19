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
            'name' => 'Indra Lubis Malik',
            'email' => 'keswakotatasik@gmail.com',
            'password' => Hash::make('p2p2024'),
            'role' => 'bidang',
            'nama_depan' => 'PTM',
            'nama_belakang' => '- INDRA',
            'nip' => '-198104252011011003',
            'phone_number' => '+82126444881',
            'bidang' => 'P2P',
            'program' => 'Program Kesehatan Jiwa dan Napza',
        ]);

        User::create([
            'name' => 'Dede Komalasari',
            'email' => 'dmalabasya@gmail.com',
            'password' => Hash::make('p2p2024'),
            'role' => 'bidang',
            'nama_depan' => 'PTM',
            'nama_belakang' => '- DEDE',
            'nip' => '-19801127200604 2015',
            'phone_number' => '+87826924509',
            'bidang' => 'P2P',
            'program' => 'Hipertensi dan Diabetes',
        ]);

        User::create([
            'name' => 'Resti Widiawati',
            'email' => 'restiwidiawati3@gmail.com',
            'password' => Hash::make('p2p2024'),
            'role' => 'bidang',
            'nama_depan' => 'P2PM',
            'nama_belakang' => '- RESTI',
            'nip' => '198603252017042003 ',
            'phone_number' => '+85351719991',
            'bidang' => 'P2P',
            'program' => 'DBD, Kecacingan, Filariaris',
        ]);

        User::create([
            'name' => 'Reni Sutraeni',
            'email' => 'renisutraeni1@gmail.com',
            'password' => Hash::make('p2p2024'),
            'role' => 'bidang',
            'nama_depan' => 'P2PM',
            'nama_belakang' => '- RENI',
            'nip' => '197605052005012019',
            'phone_number' => '+82216247970',
            'bidang' => 'P2P',
            'program' => 'Hepatitis, Kusta, Frambusia',
        ]);

        User::create([
            'name' => 'Rita Sandra',
            'email' => 'ritasandra2109@gmail.com',
            'password' => Hash::make('p2p2024'),
            'role' => 'bidang',
            'nama_depan' => 'P2PM',
            'nama_belakang' => '- RITA',
            'nip' => '198509212009022005',
            'phone_number' => '+81323998002',
            'bidang' => 'P2P',
            'program' => 'Malaria, Zoonosis, PAGHBTB',
        ]);

        User::create([
            'name' => 'Iman Dirjaman',
            'email' => 'imandirjaman@ymail.com',
            'password' => Hash::make('p2p2024'),
            'role' => 'bidang',
            'nama_depan' => 'P2PM',
            'nama_belakang' => '- IMAM',
            'nip' => '198002022006041010',
            'phone_number' => '+82118812221',
            'bidang' => 'P2P',
            'program' => 'HIV',
        ]);

        User::create([
            'name' => 'Haryati',
            'email' => 'haryati46@yahoo.com',
            'password' => Hash::make('p2p2024'),
            'role' => 'bidang',
            'nama_depan' => 'P2PM',
            'nama_belakang' => '- HARYATI',
            'nip' => '196809061988032004',
            'phone_number' => '+81222802699',
            'bidang' => 'P2P',
            'program' => 'Diare dan ISPA',
        ]);

        User::create([
            'name' => 'Enur Nurhayati',
            'email' => 'enur_tasik@yahoo.com',
            'password' => Hash::make('p2p2024'),
            'role' => 'bidang',
            'nama_depan' => 'P2PM',
            'nama_belakang' => '- ENUR',
            'nip' => '198201172010012009',
            'phone_number' => '+81221999535',
            'bidang' => 'P2P',
            'program' => 'Tuberkulosis',
        ]);

        User::create([
            'name' => 'Noor Wida Aryanti',
            'email' => 'aryantinoorwida@gmail.com',
            'password' => Hash::make('p2p2024'),
            'role' => 'bidang',
            'nama_depan' => 'SURVIM',
            'nama_belakang' => '- NOOR',
            'nip' => '197912202014082001',
            'phone_number' => '+82317475350',
            'bidang' => 'P2P',
            'program' => 'Surveilans',
        ]);

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
    }
}
