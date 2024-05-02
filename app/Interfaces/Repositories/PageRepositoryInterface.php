<?php

namespace App\Interfaces\Repositories;

interface PageRepositoryInterface
{
    public function getIndex(string $site, string $pageType, int $page, int $limit): array;

    public function getHomePage(string $site): array;

    public function generateSlug(string $site, string $pageType, string $title): string;
}
