<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SettingTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('setting')->insert([
            'id_setting' => 1,
            'nama_perusahaan' => 'PNC Mart',
            'alamat' => 'Jl. Dr. Soetomo No. 1 Sidakaya, Cilacap Selatan',
            'telepon' => '(0282) 537992',
            'tipe_nota' => 1, // 1=Kecil, 2=Besar
            'diskon' => 5,
            'path_logo' => '/img/logo.png',
            'path_kartu_member' => '/img/member.png',
        ]);
    }
}
