<?php

namespace Database\Factories;

use App\Models\dashboard;
use Illuminate\Database\Eloquent\Factories\Factory;

class dashboardFactory extends Factory
{
    protected $model = dashboard::class;

    public function definition()
    {
        return [
            'Judul' => $this->faker->sentence,
            'Deskripsi' => $this->faker->paragraph,
            'Image' => $this->faker->imageUrl(),
            // Tambahkan kolom lain sesuai dengan tabel Anda
        ];
    }
}
