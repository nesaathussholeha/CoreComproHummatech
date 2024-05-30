<?php

namespace App\Http\Controllers;

use App\Contracts\Interfaces\CollabMitraInterface;
use App\Contracts\Interfaces\NewsInterface;
use App\Contracts\Interfaces\ProductInterface;
use App\Contracts\Interfaces\ServiceInterface;
use App\Contracts\Interfaces\UniqueVisitorInterface;
use App\Contracts\Interfaces\VisitorDetectionInterface;
use App\Services\HomeService;

class HomeController extends Controller
{
    private VisitorDetectionInterface $visitorDetection;
    private UniqueVisitorInterface $uniqueVisitor;
    private ProductInterface $product;
    private CollabMitraInterface $mitra;
    private NewsInterface $news;
    private ServiceInterface $service;
    private HomeService $homeService;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(HomeService $homeService, UniqueVisitorInterface $uniqueVisitor, VisitorDetectionInterface $visitorDetection, ServiceInterface $service, ProductInterface $product, NewsInterface $news, CollabMitraInterface $mitra)
    {
        $this->middleware('auth');
        $this->visitorDetection = $visitorDetection;
        $this->uniqueVisitor = $uniqueVisitor;
        $this->service = $service;
        $this->news = $news;
        $this->homeService = $homeService;
        $this->mitra = $mitra;
        $this->product = $product;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $visitorDetections = $this->visitorDetection;
        $uniqueVisitor = $this->uniqueVisitor;
        $chartUnique = $this->homeService->Chart($visitorDetections);
        $chartVisitor = $this->homeService->ChartVisitor($uniqueVisitor);
        $services = $this->service->GetCount();
        $products = $this->product->GetCount();
        $newss = $this->news->GetCount();
        $mitras = $this->mitra->GetCount();

        return view('admin.pages.dashboard.index', compact('chartUnique', 'chartVisitor', 'services', 'products', 'newss', 'mitras'));
    }
}
