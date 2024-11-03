<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Dashboard;

class DashboardTest extends TestCase
{
    /** @test */
    public function it_can_display_products_on_dashboard()
    {
        // Membuat produk untuk pengujian
        $product = Dashboard::factory()->create();

        // Mengakses dashboard
        $response = $this->get('/Dashboard');

        // Memastikan response adalah 200 OK
        $response->assertStatus(200);

        // Memastikan produk ditampilkan di halaman
        $response->assertSee($product->Judul);
    }
}
