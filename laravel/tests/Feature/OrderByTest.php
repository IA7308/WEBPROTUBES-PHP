<?php

namespace Tests\Feature;

use App\Models\Post;
use App\Http\Controllers\PostController;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use View;

class OrderByTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    // use RefreshDatabase;

    public function test_order_by_displays_timeline_view_with_sorted_posts()
    {

        $response = $this->get('/timelineOrderBy');

        $response->assertStatus(200);
    }

}
