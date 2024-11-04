<?php

namespace Tests\Feature;

// use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\artikel;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ExampleTest extends TestCase
{
    /** @test */

    use RefreshDatabase; 
    
    public function index_displays_the_correct_article_count()
    {
        artikel::create([
            'Judul' => 'Testing',
            'Deskripsi' => 'contoh deskripsi.',
            'Image' => 'sample_image.jpg',
            'Created_by' => 'test_user',
        ]);

        artikel::create([
            'Judul' => 'Testing',
            'Deskripsi' => 'contoh deskripsi.',
            'Image' => 'sample_image.jpg',
            'Created_by' => 'test_user',
        ]);

        artikel::create([
            'Judul' => 'Testing',
            'Deskripsi' => 'contoh deskripsi.',
            'Image' => 'sample_image.jpg',
            'Created_by' => 'test_user',
        ]);

        artikel::create([
            'Judul' => 'Testing',
            'Deskripsi' => 'contoh deskripsi.',
            'Image' => 'sample_image.jpg',
            'Created_by' => 'test_user',
        ]);

        artikel::create([
            'Judul' => 'Testing',
            'Deskripsi' => 'contoh deskripsi.',
            'Image' => 'sample_image.jpg',
            'Created_by' => 'test_user',
        ]);

        $response = $this->get('/artikel');

        $response->assertStatus(200);
        $response->assertSee('5');
    }
}
