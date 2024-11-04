<?php

namespace Tests\Feature;

use Tests\TestCase;

class ArticleScrollTest extends TestCase
{
    public function test_article_ScrollUp_Successfully(): void
    {
        $response = $this->get('/artikel');
        $response->assertStatus(200);
        $response->assertSee('scrollUpBtn');
    }
}
