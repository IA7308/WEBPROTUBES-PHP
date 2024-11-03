<?php

namespace Tests\Feature;

use App\Models\Dashboard;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class DashboardTest extends TestCase
{
    use RefreshDatabase; 

    /** @test */
    public function it_can_display_products_on_dashboard()
    {
        // Membuat produk untuk pengujian
        Dashboard::create([
            'Judul' => 'Nasi Bali',
            'Deskripsi' => 'Nasi bali with healthy spices',
            'Image' => 'image.jpg',
        ]);

        // Mengakses Dashboard
        $response = $this->get('/Dashboard');

        // Memastikan response adalah 200 OK
        $response->assertStatus(200);

        // Memastikan produk ditampilkan di halaman
        $response->assertSee('Nasi Bali');
    }
}
