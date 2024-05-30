<?php

namespace App\Http\Controllers;

use App\Contracts\Interfaces\CategoryNewsInterface;
use App\Models\CategoryNews;
use App\Http\Requests\StoreCategoryNewsRequest;
use App\Http\Requests\UpdateCategoryNewsRequest;
use App\Services\CategoryNewsService;
use Illuminate\Http\Request;

class CategoryNewsController extends Controller
{
    private CategoryNewsInterface $model;
    private CategoryNewsService $service;

    public function __construct(CategoryNewsInterface $model, CategoryNewsService $services)
    {
        $this->service = $services;
        $this->model = $model;
    }
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $categoryNews = $this->model->get();
        $categoryNews = $this->model->search($request);

        return view('admin.pages.news-category.index' , compact('categoryNews'));
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
    public function store(StoreCategoryNewsRequest $request)
    {
        $data = $this->service->store($request);
        $this->model->store($data);
        return back()->with('success','Data Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(CategoryNews $model)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(CategoryNews $model)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCategoryNewsRequest $request, CategoryNews $model)
    {
        $data = $this->service->update($model, $request);
        $this->model->update($model->id , $data);
        return back()->with('success','Data Berhasil Diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CategoryNews $model)
    {
        $this->model->delete($model->id);
        return back()->with('success','Data berhasil dihapus');
    }
}
