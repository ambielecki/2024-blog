<?php

namespace App\Repositories;

use App\Interfaces\Repositories\PageRepositoryInterface;
use App\Models\Page;
use App\Models\Pages\HomePage;

class PageRepository implements PageRepositoryInterface
{
    public function getIndex(string $site, string $pageType, int $page = 1, int $limit = 20): array {
        $skip = (($page - 1) * $limit);

        $pages = Page::query()
            ->where([
                ['site', $site],
                ['page_type', $pageType],
                ['is_active', 1],
            ])
            ->limit($limit)
            ->skip($skip)
            ->get();

        return $pages ? $pages->toArray() : [];
    }

    public function getHomePage(string $site): array {
        $page = HomePage::query()
            ->where([
                ['site', $site],
                ['is_active', 1],
            ])
            ->orderBy('id', 'desc')
            ->first();

        return $page ? $page->toArray() : [];
    }

    public function generateSlug(string $site, string $pageType, string $title): string {
        $slug = '/' .strtolower(trim(preg_replace('~[^\pL\d]+~u', '-', $title)));

        $pageCount = Page::query()
            ->where([
                ['site', $site],
                ['page_type', $pageType],
                ['slug', $slug],
            ])
            ->count('id');

        if ($pageCount === 0) {
            return $slug;
        }

        $uniqueNumber = 1;
        $unique = false;
        $testSlug = '';

        while (!$unique) {
            $uniqueNumber++;
            $testSlug = $slug . '-' . $uniqueNumber;

            $pageCount = Page::query()
                ->where([
                    ['site', $site],
                    ['page_type', $pageType],
                    ['slug', $testSlug],
                ])
                ->count('id');

            if ($pageCount === 0) {
                $unique = true;
            }
        }

        return $testSlug;
    }
}
