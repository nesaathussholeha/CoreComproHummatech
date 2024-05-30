<?php

namespace App\Http\Controllers;

use App\Contracts\Interfaces\WorkFlowInterface;
use App\Models\Workflow;
use App\Http\Requests\StoreWorkflowRequest;
use App\Http\Requests\UpdateWorkflowRequest;
use Illuminate\Http\Request;

class WorkflowController extends Controller
{

    private WorkFlowInterface $workflow;

    public function __construct(WorkFlowInterface $workflow)
    {
        $this->workflow = $workflow;
    }
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $workflows = $this->workflow->get();
        $workflows = $this->workflow->search($request);
        return view('admin.pages.vacancy.work-flow' , compact('workflows'));
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
    public function store(StoreWorkflowRequest $request)
    {
        $this->workflow->store($request->validated());
        return back()->with('success' , 'Berhasil Menambahkan Data');
    }

    /**
     * Display the specified resource.
     */
    public function show(Workflow $workflow)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Workflow $workflow)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateWorkflowRequest $request, Workflow $workflow)
    {
        $this->workflow->update( $workflow->id , $request->validated());
        return back()->with('success' , 'Data Berhasil Di perbarui');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Workflow $workflow)
    {
        $this->workflow->delete($workflow->id);
        return back()->with('success' , 'Data Berhasil Di hapus');
    }
}
