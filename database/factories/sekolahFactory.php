<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\sekolah>
 */
class sekolahFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nama_sekolahan' => fake()->company(),
            'alamat' => fake()->address(),
            'tingkat_sekolah_id' => 1,
        ];
    }
}
