<?php

namespace App\Http\Controllers;

use App\Contracts\Interfaces\CategoryProductInterface;
use App\Models\CategoryProduct;
use App\Http\Requests\StoreCategoryProductRequest;
use App\Http\Requests\UpdateCategoryProductRequest;
use App\Services\CategoryProductService;
use Illuminate\Http\Request;

class CategoryProductController extends Controller
{

    private CategoryProductInterface $categoryProduct;
    private CategoryProductService $service;

    public function __construct(CategoryProductInterface $categoryProduct, CategoryProductService $service)
    {
        $this->categoryProduct = $categoryProduct;
        $this->service = $service;
    }
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $categoryProducts = $this->categoryProduct->get();
        $categoryProducts = $this->categoryProduct->search($request);
        return view('admin.pages.product-category.index' , compact('categoryProducts'));
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
    public function store(StoreCategoryProductRequest $request)
    {
       $data = $this->service->store($request);
        $this->categoryProduct->store($data);
        return back()->with('success' , 'Berhasil Menambahkan data');
    }

    /**
     * Display the specified resource.
     */
    public function show(CategoryProduct $categoryProduct)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(CategoryProduct $categoryProduct)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCategoryProductRequest $request, CategoryProduct $categoryProduct)
    {
        $data = $this->service->update( $categoryProduct,$request);
        $this->categoryProduct->update($categoryProduct->id , $data);
        return back()->with('success' , 'Berhasil Memperbarui Data');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CategoryProduct $categoryProduct)
    {
        $this->categoryProduct->delete($categoryProduct->id);
        return back()->with('success' , 'Berhasil Menghapus data');
    }
}
