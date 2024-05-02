<?php

namespace Feature\Repositories;

use App\Interfaces\Repositories\PageRepositoryInterface;
use App\Models\Page;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class PageRepositoryTest extends TestCase
{
    use RefreshDatabase;

    public function test_it_creates_unique_slugs(): void {
        $pageRepository = app()->get(PageRepositoryInterface::class);

        $testTitle = 'This is a test title';

        $page = Page::factory()->create([
            'site' => 'test',
            'page_type' => 'test',
            'title' => $testTitle,
            'slug' => $pageRepository->generateSlug('test', 'test', $testTitle),
        ]);

        $this->assertEquals('this-is-a-test-title', $page->slug);

        $pageTwo = Page::factory()->create([
            'site' => 'test',
            'page_type' => 'test',
            'title' => $testTitle,
            'slug' => $pageRepository->generateSlug('test', 'test', $testTitle),
        ]);

        $this->assertEquals('this-is-a-test-title-2', $pageTwo->slug);

        $pageThree = Page::factory()->create([
            'site' => 'test',
            'page_type' => 'different_type',
            'title' => $testTitle,
            'slug' => $pageRepository->generateSlug('test', 'different_type', $testTitle),
        ]);

        $this->assertEquals('this-is-a-test-title', $pageThree->slug);

        $pageFour = Page::factory()->create([
            'site' => 'different_site',
            'page_type' => 'test',
            'title' => $testTitle,
            'slug' => $pageRepository->generateSlug('different_site', 'test', $testTitle),
        ]);

        $this->assertEquals('this-is-a-test-title', $pageFour->slug);
    }
}
