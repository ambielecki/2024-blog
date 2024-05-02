<?php

namespace App\Http\Controllers;

use App\Repositories\PageRepository;
use Illuminate\Http\JsonResponse;

class PageController extends Controller
{
    public function index(PageRepository $repository, $site, $pageType): JsonResponse {
        return response()->json($repository->getIndex($site, $pageType));
    }
}
