<?php

namespace App\Http\Controllers;

use App\Contracts\Interfaces\NewsInterface;
use App\Contracts\Interfaces\ServiceInterface;
use Illuminate\Http\Request;

class SitemapController extends Controller
{
    private NewsInterface $news;
    private ServiceInterface $service;

    public function __construct(NewsInterface $news, ServiceInterface $service)
    {
        $this->news = $news;
        $this->service = $service;
    }

    /**
     * Sitemap Generator (/sitemap.xml)
     *
     * @package hummatech
     * @see https://github.com/spatie/laravel-sitemap
     */
    public function __invoke()
    {
        $newsData = $this->news->get();
        $serviceData = $this->service->get();

        return response()->view('sitemap', compact('newsData', 'serviceData'))->header('Content-Type', 'text/xml');
    }
}
