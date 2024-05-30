<?php

namespace App\Http\Controllers;

use App\Contracts\Interfaces\EnterpriseStructureInterface;
use App\Http\Requests\StoreEnterpriseStructureRequest;
use App\Http\Requests\UpdateEnterpriseStructureRequest;
use App\Models\EnterpriseStructure;
use App\Services\EnterpriseStructureService;
use Illuminate\Http\Request;

class EnterpriseStructureController extends Controller
{
    private EnterpriseStructureInterface $enterprise;
    private EnterpriseStructureService $enterpriseService;

    public function __construct(EnterpriseStructureInterface $enterprise, EnterpriseStructureService $enterpriseService)
    {
        $this->middleware('auth');
        $this->enterprise = $enterprise;
        $this->enterpriseService = $enterpriseService;
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $data = $this->enterprise->customPaginate($request, 12);
        return view('admin.pages.setting.company.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {}

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreEnterpriseStructureRequest $request)
    {
        $data = $this->enterpriseService->store($request);
        $this->enterprise->store($data);
        return redirect()->back()->with('success','Data Berhasil di Tambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(EnterpriseStructure $enterpriseStructure)
    {}

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(EnterpriseStructure $enterpriseStructure)
    {}

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateEnterpriseStructureRequest $request, EnterpriseStructure $enterpriseStructure)
    {
        $data = $this->enterpriseService->update($enterpriseStructure, $request);
        $this->enterprise->update($enterpriseStructure->id, $data);
        return redirect()->route('company.index')->with('success', 'Data Berhasil di Perbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(EnterpriseStructure $enterpriseStructure)
    {
        $this->enterprise->delete($enterpriseStructure->id);
        return back()->with('success','Data Berhasil di Hapus');
    }
}
