<?php

namespace App\Http\Controllers;

use App\Contracts\Interfaces\LogoInterface;
use App\Models\Logo;
use App\Http\Requests\StoreLogoRequest;
use App\Http\Requests\UpdateLogoRequest;
use App\Services\LogoService;

class LogoController extends Controller
{
    private LogoInterface $logo;
    private LogoService $service;

    public function __construct(LogoInterface $logo , LogoService $service)
    {
        $this->logo = $logo;
        $this->service = $service;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $logos  = $this->logo->get();
        return view('admin.pages.setting.philosophy.index', compact('logos'));
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
    public function store(StoreLogoRequest $request)
    {
        $data = $this->service->store($request);
        $this->logo->store($data);
        return back()->with('success' , 'Berhasil Menambahkan data');
    }

    /**
     * Display the specified resource.
     */
    public function show(Logo $logo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Logo $logo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateLogoRequest $request, Logo $logo)
    {
        $data = $this->service->update($logo, $request);
        $this->logo->update($logo->id, $data);
        return back()->with('success' , 'Berhasi Memperbarui Data');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Logo $logo)
    {
        $this->service->delete($logo);
        $this->logo->delete($logo->id);
        return back()->with('success' , 'Berhasi Menghapus Data');
    }
}
