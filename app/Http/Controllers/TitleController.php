<?php

namespace App\Http\Controllers;

use App\Contracts\Interfaces\TitleInterface;
use App\Models\Title;
use App\Http\Requests\StoreTitleRequest;
use App\Http\Requests\UpdateTitleRequest;

class TitleController extends Controller
{

    private TitleInterface $title;
    public function title(TitleInterface $title)
    {
        $this->title = $title;
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
    public function store(StoreTitleRequest $request)
    {
        $this->title->store($request->validated());
        return back()->with('success' , 'Berhasil Menambahkan Data');
    }

    /**
     * Display the specified resource.
     */
    public function show(Title $title)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Title $title)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTitleRequest $request, Title $title)
    {
        $this->title->update($title->id, $request->validated());
        return back()->with('success' , 'Berhasil Memperbarui Data');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Title $title)
    {
        $this->title->delete($title->id);
        return back()->with('success' , 'Berhasil Menghapus data');
    }
}
