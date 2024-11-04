<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Artikel;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ArtikelTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_displays_the_correct_count_in_the_view()
    {
        Artikel::factory()->count(5)->create();

        $response = $this->get(route('artikel.index'));

        $response->assertViewHas('count', 5);
    }
}
