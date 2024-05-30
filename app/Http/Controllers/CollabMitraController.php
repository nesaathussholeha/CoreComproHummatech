<?php

namespace App\Http\Controllers;

use App\Contracts\Interfaces\CollabCategoryInterface;
use App\Contracts\Interfaces\CollabMitraInterface;
use App\Contracts\Interfaces\ServiceInterface;
use App\Contracts\Interfaces\ServiceMitraInterface;
use App\Models\CollabMitra;
use App\Http\Requests\StoreCollabMitraRequest;
use App\Http\Requests\UpdateCollabMitraRequest;
use App\Models\CollabCategory;
use App\Services\PartnerService;
use App\Services\ServiceMitraService;
use Illuminate\Http\Request;

class CollabMitraController extends Controller
{
    private CollabMitraInterface $collabMitra;
    private PartnerService $service;
    private ServiceInterface $serviceintervace;
    private CollabCategoryInterface $collabCategory;
    private ServiceMitraService $serviceMitraService;
    public function __construct(CollabMitraInterface $collabMitra, PartnerService $partnerService, ServiceInterface $serviceintervace, CollabCategoryInterface $collabCategory, ServiceMitraService $serviceMitraService)
    {
        $this->collabMitra = $collabMitra;
        $this->service = $partnerService;
        $this->serviceintervace = $serviceintervace;
        $this->collabCategory = $collabCategory;
        $this->serviceMitraService = $serviceMitraService;
    }
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $collabMitras = $this->collabMitra->get();
        $collabMitras = $this->collabMitra->search($request);
        $categories = $this->collabCategory->get();
        $services = $this->serviceintervace->get();
        return view('admin.pages.collab.index', compact('collabMitras', 'categories', 'services'));
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
    public function store(StoreCollabMitraRequest $request)
    {
        $data = $this->service->store($request);
        $collabId = $this->collabMitra->store($data);
        $this->serviceMitraService->store($request,$collabId);

        return back()->with('success', 'Berhasil Di Tambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(CollabMitra $collabMitra)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(CollabMitra $collabMitra)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCollabMitraRequest $request, CollabMitra $collabMitra)
    {
        // dd($request->all());
        $data = $this->service->update($collabMitra, $request);
        $this->collabMitra->update($collabMitra->id, $data);
        $this->serviceMitraService->update($request, $collabMitra);
        return back()->with('success', 'Berhasil Di Perbarui');
    }
  /**
     * Remove the specified resource from storage.
     */
    public function destroy(CollabMitra $collabMitra)
    {
        if (!$this->collabMitra->delete($collabMitra->id)) {
            return back()->with('error', 'Data Gagal Di Hapus');
        }

        $this->service->remove($collabMitra->image);
        return back()->with('success', 'Data Berhasil Di Hapus');
        // $this->collabMitra->delete($collabMitra->id);
        // return back();
    }
}
