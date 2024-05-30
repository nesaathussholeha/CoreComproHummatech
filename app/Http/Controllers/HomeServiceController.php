<?php

namespace App\Http\Controllers;

use App\Contracts\Interfaces\ProductInterface;
use App\Contracts\Interfaces\ServiceInterface;
use App\Models\Service;
use Illuminate\Http\Request;

class HomeServiceController extends Controller
{
    private ProductInterface $product;

    public function __construct(ProductInterface $product)
    {
        $this->product = $product;
    }

    public function index()
    {
        $products = $this->product->get();
        return view('landing.service.service-detail', compact('products'));
    }

    public function detail(Service $service)
    {
        $products = $this->product->getByServiceId($service->id);
        return view('landing.service.service-detail', compact('products'));
    }
}
