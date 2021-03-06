<?php

namespace Tests\Unit;

use App\Models\Page;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class PageTest extends TestCase
{
    use WithFaker, RefreshDatabase;

    /** @test */
    public function a_page_has_a_path()
    {
        $this->withoutExceptionHandling();
        $this->signIn();
        $page = factory(Page::class)->create();
        $this->assertEquals('/page/'.$page->id, $page->path());
    }
}
