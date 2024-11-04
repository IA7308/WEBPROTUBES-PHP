<?php

namespace Database\Factories;

use App\Models\artikel;
use Illuminate\Database\Eloquent\Factories\Factory;

class artikelFactory extends Factory
{
    protected $model = artikel::class;

    public function definition()
    {
        return [
            'Judul' => $this->faker->sentence,
            'Image' => $this->faker->imageUrl(),
            'Created_by' => $this->faker->name,
            'Deskripsi' => $this->faker->paragraph,
        ];
    }
}
