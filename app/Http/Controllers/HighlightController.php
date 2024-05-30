<?php

namespace App\Http\Controllers;

use App\Contracts\Interfaces\HiglightInterface;
use App\Models\Highlight;
use App\Http\Requests\StoreHighlightRequest;
use App\Http\Requests\UpdateHighlightRequest;

class HighlightController extends Controller
{
    private HiglightInterface $highlight;
    public function __construct(HiglightInterface $highlight)
    {
        $this->highlight = $highlight;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
    public function store(StoreHighlightRequest $request)
    {
        $this->highlight->store($request->validated());
        return back()->with('success' , 'Berhasil Menambahkan Data');
    }

    /**
     * Display the specified resource.
     */
    public function show(Highlight $highlight)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Highlight $highlight)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateHighlightRequest $request, Highlight $highlight)
    {
        $this->highlight->update($highlight->id, $request->validated());
        return back()->with('success' , 'Berhasil Memperbarui Data');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Highlight $highlight)
    {
        $this->highlight->delete($highlight->id);
        return back()->with('success' , 'Berhasil Menghapus data');
    }
}
