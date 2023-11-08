<?php

namespace Database\Seeders;

use App\Models\roles;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class roleseeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        roles::factory()->create([
            'name' => 'superadmin',
        ]);
        roles::factory()->create([
            'name' => 'admin',
        ]);
        roles::factory()->create([
            'name' => 'user',
        ]);
    }
}
