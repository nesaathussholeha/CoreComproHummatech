<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Services\NewsService;
use App\Http\Controllers\Controller;
use App\Contracts\Interfaces\NewsInterface;
use App\Contracts\Interfaces\BackgroundInterface;
use App\Contracts\Interfaces\CategoryNewsInterface;
use App\Contracts\Interfaces\NewsCategoryInterface;
use App\Helpers\ResponseHelper;
use App\Http\Resources\NewsResource;

class NewsController extends Controller
{
    private NewsInterface $news;
    private NewsService $newsService;
    private CategoryNewsInterface $category;
    private NewsCategoryInterface $newsCategory;
    private BackgroundInterface $background;

    public function __construct(NewsInterface $news, NewsService $newsService, CategoryNewsInterface $category, NewsCategoryInterface $newsCategoryInterface, BackgroundInterface $background)
    {
        $this->newsCategory = $newsCategoryInterface;
        $this->news = $news;
        $this->newsService = $newsService;
        $this->category = $category;
        $this->background = $background;
    }
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $news = $this->news->customPaginate($request, 12);

        return ResponseHelper::success(NewsResource::collection($news));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
