<?php

namespace App\Http\Controllers;

use App\Contracts\Interfaces\CollabCategoryInterface;
use App\Models\CollabCategory;
use App\Http\Requests\StoreCollabCategoryRequest;
use App\Http\Requests\UpdateCollabCategoryRequest;
use Illuminate\Http\Request;

class CollabCategoryController extends Controller
{
    private CollabCategoryInterface $collabCategory;
    public function __construct(CollabCategoryInterface $collabCategory)
    {
        $this->collabCategory = $collabCategory;
    }
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $collabCategorys = $this->collabCategory->get();
        $collabCategorys = $this->collabCategory->search($request);
        return view('admin.pages.collab-category.index', compact('collabCategorys'));
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
    public function store(StoreCollabCategoryRequest $request)
    {
        $this->collabCategory->store($request->validated());
        return back()->with('success', 'Berhasil Di Tambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(CollabCategory $collabCategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(CollabCategory $collabCategory)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCollabCategoryRequest $request, CollabCategory $collabCategory)
    {
        $this->collabCategory->update($collabCategory->id, $request->validated());
        return back()->with('success', 'Berhasil Di Perbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CollabCategory $collabCategory)
    {
        $this->collabCategory->delete($collabCategory->id);
        return back()->with('success', 'Berhasil Di Hapus');

    }
}
