<?php

namespace App\Http\Controllers;

use App\Contracts\Interfaces\SosialMediaInterface;
use App\Models\SosialMedia;
use App\Http\Requests\StoreSosialMediaRequest;
use App\Http\Requests\UpdateSosialMediaRequest;
use App\Services\SosialMediaService;
use Illuminate\Http\Request;

class SosialMediaController extends Controller
{
    private SosialMediaInterface $sosialMedia;
    private SosialMediaService $service;
    public function __construct(SosialMediaInterface $sosialMedia, SosialMediaService $service)
    {
        $this->sosialMedia = $sosialMedia;
        $this->service = $service;
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $socialMedia = $this->sosialMedia->get();
        $socialMedia = $this->sosialMedia->search($request);

        return view('admin.pages.social-media.index', compact('socialMedia'));

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
    public function store(StoreSosialMediaRequest $request)
    {
        $data = $this->service->store($request);
        $this->sosialMedia->store($data);
        return back()->with('success','Data Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(SosialMedia $sosialMedia)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(SosialMedia $sosialMedia)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSosialMediaRequest $request, SosialMedia $sosialMedia)
    {
        $data = $this->service->update($sosialMedia, $request);
        $this->sosialMedia->update($sosialMedia->id, $data);
        return back()->with('success', 'Berhasil Di Perbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(SosialMedia $sosialMedia)
    {
      $this->sosialMedia->delete($sosialMedia->id);
      return back()->with('Data Berhasil Dihapus');
    }
}
