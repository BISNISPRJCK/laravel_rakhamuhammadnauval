<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\RumahSakit;
use App\Models\Pasien;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        User::create([
            'username' => 'admin',
            'password' => Hash::make('admin123'),
        ]);

        $rs1 = RumahSakit::create([
            'nama' => 'RS Harapan Sehat',
            'alamat' => 'Jl. Merdeka No.10',
            'email' => 'info@harapansehat.com',
            'telepon' => '021888999',
        ]);

        $rs2 = RumahSakit::create([
            'nama' => 'RS Kasih Ibu',
            'alamat' => 'Jl. Mawar No.15',
            'email' => 'info@kasihibu.com',
            'telepon' => '021777888',
        ]);

        Pasien::create([
            'nama' => 'Budi Santoso',
            'alamat' => 'Jl. Melati 5',
            'no_telpon' => '08123456789',
            'rumah_sakit_id' => $rs1->id,
        ]);

        Pasien::create([
            'nama' => 'Siti Aminah',
            'alamat' => 'Jl. Anggrek 2',
            'no_telpon' => '08987654321',
            'rumah_sakit_id' => $rs2->id,
        ]);
    }
}
