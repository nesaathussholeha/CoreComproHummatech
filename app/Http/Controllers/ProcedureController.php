<?php

namespace App\Http\Controllers;

use App\Contracts\Interfaces\ProcedureInterface;
use App\Contracts\Interfaces\ServiceInterface;
use App\Models\Procedure;
use App\Http\Requests\StoreProcedureRequest;
use App\Http\Requests\UpdateProcedureRequest;
use Illuminate\Http\Request;

class ProcedureController extends Controller
{
    private ProcedureInterface $procedure;
    private ServiceInterface $service;

    public function __construct(ProcedureInterface $procedure, ServiceInterface $service)
    {
        $this->procedure = $procedure;
        $this->service = $service;
    }
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $procedures = $this->procedure->get();
        $procedures = $this->procedure->search($request);

        $services = $this->service->get();
        return view('admin.pages.procedure.index', compact('procedures', 'services'));
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
    public function store(StoreProcedureRequest $request)
    {
        $data = $request->all();
        $this->procedure->store($data);
        return redirect()->route('procedure.index')->with('success','Data BErhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Procedure $procedure)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Procedure $procedure)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProcedureRequest $request, Procedure $procedure)
    {
        $data = $request->all();
        $this->procedure->update($procedure->id, $data);
        return redirect()->route('procedure.index')->with('success','Data Berhasil Diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Procedure $procedure)
    {
        $procedure->delete();
        return redirect()->route('procedure.index')->with('Data Berhasil Dihapus');
    }
}
