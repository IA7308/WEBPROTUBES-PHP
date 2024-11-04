<?php

namespace Tests\Feature;

use App\Models\Dashboard;
use App\Models\HealthSis;
use Illuminate\Support\Facades\Hash;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class DashboardTest extends TestCase
{
    use RefreshDatabase; 


    protected $user;
    protected $oldPassword = 'password123';

    protected function setUp(): void
    {
        parent::setUp();

        // Create test user
        $this->user = HealthSis::create([
            'FirstName' => 'John',
            'LastName' => 'Doe',
            'Username' => 'johndoe',
            'Email' => 'john@example.com',
            'password' => Hash::make($this->oldPassword),
            'NoHP' => '1234567890',
            'Status' => 'Active',
            'Note' => 'Test user',
            'Umur' => '25 tahun',
            'TanggalLahir' => '1998-01-01',
            'Image' => 'default.jpg'
        ]);
    }

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
