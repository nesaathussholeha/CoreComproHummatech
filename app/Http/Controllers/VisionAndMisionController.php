<?php

namespace App\Http\Controllers;

use App\Contracts\Interfaces\ServiceInterface;
use App\Contracts\Interfaces\VisionAndMisionInterface;
use App\Models\VisionAndMision;
use App\Http\Requests\StoreVisionAndMisionRequest;
use App\Http\Requests\UpdateVisionAndMisionRequest;
use App\Models\MisionItems;
use App\Services\VisionAndMisionService;

class VisionAndMisionController extends Controller
{
    private VisionAndMisionInterface $visionAndMision;
    private VisionAndMisionService $vismisionservices;
    private ServiceInterface $service;

    public function __construct(VisionAndMisionInterface $visionAndMision, VisionAndMisionService $vismisionservices, ServiceInterface $service)
    {
        $this->visionAndMision = $visionAndMision;
        $this->vismisionservices = $vismisionservices;
        $this->service = $service;
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $visionAndMisions = $this->visionAndMision->get()->first();
        $mision = MisionItems::where('vision_and_mission_id', $visionAndMisions ? $visionAndMisions->id : '')->get();
        $services = $this->service->get();
        $misionservice = MisionItems::where('vision_and_mission_id', null)->get();

        return view('admin.pages.vision-mision.index', compact('visionAndMisions', 'mision', 'services', 'misionservice'));
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
    public function store(StoreVisionAndMisionRequest $request)
    {
        $visionAndMisions = $this->visionAndMision->get()->first();
        $data = $this->vismisionservices->store($request);
        if ($request->status == 'office') {
            foreach ($data as $item) {
                if ($visionAndMisions) {
                    $this->visionAndMision->update($visionAndMisions->id, $item);
                    $useId = $visionAndMisions;
                } else {
                    $useId = $this->visionAndMision->store($item);
                }
            }
        } else {

            $useId = $visionAndMisions;
        }
        $this->vismisionservices->storemision($request, $useId);
        return redirect()->back()->with('success', 'Data Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(VisionAndMision $visionAndMision)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(VisionAndMision $visionAndMision)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateVisionAndMisionRequest $request, VisionAndMision $visionAndMision)
    {
        $data = $this->vismisionservices->update($request);
        foreach ($data as $item) {
            $this->visionAndMision->update($visionAndMision->id, $item);
        }
    }

    public function updatemision(UpdateVisionAndMisionRequest $request, MisionItems $misionItems)
    {
        $this->vismisionservices->updatemision($request, $misionItems);

        return redirect()->back()->with('success', 'Data Berhasil Diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(VisionAndMision $visionAndMision)
    {
        $this->visionAndMision->delete($visionAndMision->id);

        return redirect()->back()->with('success', 'Data Berhasil Di hapus');
    }

    public function destroymision(MisionItems $misionItems)
    {
        $this->vismisionservices->destroy($misionItems);

        return redirect()->back()->with('success', 'Data Berhasil Di Hapus');
    }
}
