<?php

namespace App\Http\Controllers;

use App\Contracts\Interfaces\SalesPackageInterface;
use App\Http\Requests\SalesPackageRequest;
use App\Models\SalesPackage;
use Illuminate\Http\Request;

class SalesPackageController extends Controller
{
    private SalesPackageInterface $salesPackage;

    public function __construct(SalesPackageInterface $salesPackage)
    {
        $this->salesPackage = $salesPackage;
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
    public function store(SalesPackageRequest $request)
    {
        $this->salesPackage->store($request->all());
        return back()->with('succes', 'Paket penjualan berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(SalesPackage $salesPackage)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(SalesPackage $salesPackage)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(SalesPackageRequest $request, SalesPackage $salesPackage)
    {
        $this->salesPackage->update($salesPackage->id, $request->all());
        return to_route('sale.show', $salesPackage->sale_id)->with('succes', 'Paket penjualan berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(SalesPackage $salesPackage)
    {
        if (!$this->salesPackage->delete($salesPackage->id)) {
            return to_route('sale.show', $salesPackage->sale_id)->with('error', 'Penjualan Gagal Di Hapus');
        }

        return to_route('sale.show', $salesPackage->sale_id)->with('success' , 'Penjualan Berhasil Di Hapus');
    }
}
