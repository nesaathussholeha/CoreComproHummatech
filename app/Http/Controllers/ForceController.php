<?php

namespace App\Http\Controllers;

use App\Models\Force;
use App\Http\Requests\StoreForceRequest;
use App\Http\Requests\UpdateForceRequest;
use App\Contracts\Interfaces\ForceInterface;

class ForceController extends Controller
{
    private $force;
    public function __construct(ForceInterface $force)
    {
        $this->force = $force;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $forces = $this->force->get();
        // dd($forces);
        return view('admin.pages.force.index', compact('forces'));
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
    public function store(StoreForceRequest $request)
    {
        $data = $request->validated();
        $this->force->store($data);

        return redirect()->route('force.index')->with('success', 'Force created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Force $force)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Force $force)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateForceRequest $request, Force $force)
    {
        $data = $request->all();
        $this->force->update($force->id, $data);

        return redirect()->route('force.index')->with('success', 'Force updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Force $force)
    {
        $force->delete();

        return redirect()->route('force.index')->with('success', 'Force deleted successfully');
    }
}
