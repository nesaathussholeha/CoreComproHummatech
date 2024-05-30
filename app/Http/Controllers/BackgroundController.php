<?php

namespace App\Http\Controllers;

use App\Contracts\Interfaces\BackgroundInterface;
use App\Http\Requests\StoreBackgroundRequest;
use App\Http\Requests\UpdateBackgroundRequest;
use App\Models\Background;
use App\Services\BackgroundService;
use Illuminate\Support\Facades\Request;

class BackgroundController extends Controller
{
    private BackgroundInterface $background;
    private BackgroundService $service;

    public function __construct(BackgroundInterface $background, BackgroundService $service) {
        $this->background = $background;
        $this->service = $service;
        $this->middleware('auth');
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
    public function store(StoreBackgroundRequest $request)
    {
        $data = $this->service->store($request);
        $this->background->store($data);
        return back()->with('success', 'Background Berhasil Di Tambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Background $background)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Background $background)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBackgroundRequest $request, Background $background)
    {
        $data = $this->service->update($background, $request);
        $this->background->update($background->id, $data);
        return redirect()->back()->with('success', 'Background berhasil Di Perbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Background $background)
    {
        $this->service->delete($background);
        $this->background->delete($background->id);
        return redirect()->back()->with('success', 'Background Berhasil Di Hapus');
    }
}
