<?php

namespace App\Http\Controllers;

use App\Contracts\Interfaces\StructureInterface;
use App\Enums\StructureEnum;
use App\Models\Structure;
use App\Http\Requests\StoreStructureRequest;
use App\Http\Requests\UpdateStructureRequest;
use App\Services\StructureService;

class StructureController extends Controller
{

    private StructureInterface $structure;
    private StructureService $service;

    public function __construct(StructureInterface $structure , StructureService $service)
    {
        $this->structure = $structure;
        $this->service = $service;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $structures = $this->structure->get();
        $organization = $this->structure->getByType(StructureEnum::STRUCTURE_ORGANIZAZE->value);
        $business = $this->structure->getByType(StructureEnum::STRUCTURE_BUSINESS->value);
        return view('admin.pages.structure.index' , compact('organization', 'business', 'structures'));
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
    public function store(StoreStructureRequest $request)
    {
        $data = $this->service->store($request);
        $this->structure->store($data);
        return back()->with('success' , 'Struktur berhasil di tambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Structure $structure)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Structure $structure)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateStructureRequest $request, Structure $structure)
    {
        $data = $this->service->update($structure, $request);
        $this->structure->update($structure->id, $data);
        return back()->with('success', 'Berhasil Di Perbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Structure $structure)
    {
        $this->service->delete($structure);
        $this->structure->delete($structure->id);
        return redirect()->back()->with('success','Data Berhasil Dihapus');
    }
}
