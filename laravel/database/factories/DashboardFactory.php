<?php

namespace Database\Factories;

use App\Models\Dashboard;
use Illuminate\Database\Eloquent\Factories\Factory;

class DashboardFactory extends Factory
{
    protected $model = Dashboard::class;

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
