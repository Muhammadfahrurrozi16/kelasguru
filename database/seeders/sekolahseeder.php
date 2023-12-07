<?php

namespace Database\Seeders;

use App\Models\sekolah;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class sekolahseeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        sekolah::factory(4)->create();
    }
}
