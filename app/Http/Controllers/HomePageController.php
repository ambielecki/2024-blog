<?php

namespace App\Http\Controllers;

use App\Interfaces\Repositories\PageRepositoryInterface;
use App\Repositories\PageRepository;
use Illuminate\Http\JsonResponse;

class HomePageController extends Controller
{
    private PageRepository $pageRepository;

    public function __construct(PageRepositoryInterface $pageRepository) {
        $this->pageRepository = $pageRepository;
    }

    public function index($site): JsonResponse {
        $homePage = $this->pageRepository->getHomePage($site);

        if ($homePage) {
            return response()->json($this->pageRepository->getHomePage( $site));
        }

        return response()->json([], 400);
    }
}
