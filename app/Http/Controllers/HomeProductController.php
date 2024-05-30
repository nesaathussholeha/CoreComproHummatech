<?php

namespace App\Http\Controllers;

use App\Contracts\Interfaces\BackgroundInterface;
use App\Contracts\Interfaces\ProductInterface;
use App\Enums\ProductEnum;
use Illuminate\Http\Request;
use App\Contracts\Interfaces\CategoryProductInterface;
use App\Contracts\Interfaces\ComingSoonProductInterface;
use App\Models\CategoryProduct;

class HomeProductController extends Controller
{
    private ProductInterface $product;
    private BackgroundInterface $background;
    private CategoryProductInterface $categoryProduct;
    private ComingSoonProductInterface $comingProduct;

    public function __construct(ProductInterface $product, CategoryProductInterface $categoryProduct, BackgroundInterface $background, ComingSoonProductInterface $comingProduct)
    {
        $this->product = $product;
        $this->comingProduct = $comingProduct;
        $this->categoryProduct = $categoryProduct;
        $this->background = $background;
    }

    public function index()
    {
        $products = $this->product->getByType('company');
        $background = $this->background->getByType('Portofolio');
        $categories = $this->categoryProduct->get();
        $comingProducts = $this->comingProduct->get();

        return view('landing.product', compact('products', 'background','categories', 'comingProducts'));
    }

    public function portfolio()
    {
        $portfolios = $this->product->getByType('portfolio');
        $background = $this->background->getByType('Portofolio');
        $categories = $this->categoryProduct->get();

        return view('landing.portfolio', compact('portfolios', 'background','categories'));
    }

    public function productCategory(Request $request, CategoryProduct $category)
    {
        $products = $this->product->where($category->id);
        // dd($products);
        $background = $this->background->getByType('Portofolio');
        $categories = $this->categoryProduct->get();
        $comingProducts = $this->comingProduct->get();
        return view('landing.product', compact('products', 'categories', 'background' ,'comingProducts'));
    }

    public function productComing(Request $request, CategoryProduct $category)
    {
        $background = $this->background->getByType('Portofolio');
        $categories = $this->categoryProduct->get();
        $comingProducts = $this->comingProduct->get();
        return view('landing.product', compact('categories', 'background' ,'comingProducts'));
    }
}
