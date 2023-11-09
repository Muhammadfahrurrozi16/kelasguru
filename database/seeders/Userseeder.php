<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class Userseeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::factory(20)->create();
        User::factory()->create([
            'name' => 'andi',
            'username' => 'andi',
            'email' => 'andi21@gmail.com',
            'email_verified_at' => now(),
            'roles_id' => 1,
            'phone' => '089234567821',
            'bio' => 'flutter dev',
            'password' => Hash::make('123456'),
        ]);
        User::factory()->create([
            'name' => 'andi27',
            'username' => 'andi27',
            'email' => 'andi@gmail.com',
            'email_verified_at' => now(),
            'roles_id' => 2,
            'phone' => '089234567821',
            'bio' => 'flutter dev',
            'password' => Hash::make('123456'),
        ]);
        User::factory()->create([
            'name' => 'adi',
            'username' => 'adi',
            'email' => 'adi@gmail.com',
            'email_verified_at' => now(),
            'roles_id' => 3,
            'phone' => '089234567821',
            'bio' => 'flutter dev',
            'password' => Hash::make('123456'),
        ]);
    }
}
