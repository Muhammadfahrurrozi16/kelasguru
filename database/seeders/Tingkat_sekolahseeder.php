<?php

namespace Database\Seeders;

use App\Models\tingkat_sekolah;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class Tingkat_sekolahseeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        tingkat_sekolah::factory()->create([
            'nama' => 'SD',
        ]);
        tingkat_sekolah::factory()->create([
            'nama' => 'SMP',
        ]);
        tingkat_sekolah::factory()->create([
            'nama' => 'SMA',
        ]);
    }
}
