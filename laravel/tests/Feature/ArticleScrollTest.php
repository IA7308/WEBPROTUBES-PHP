<?php

namespace Tests\Feature;

use Tests\TestCase;

class ArticleScrollTest extends TestCase
{
    public function test_artikel_page_loads_successfully(): void
    {
        $response = $this->get('/artikel');
        $response->assertStatus(200);
        $response->assertSee('scrollUpBtn');
    }
}
