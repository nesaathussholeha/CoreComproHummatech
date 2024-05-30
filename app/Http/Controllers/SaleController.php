<?php

namespace App\Http\Controllers;

use App\Contracts\Interfaces\SaleInterface;
use App\Contracts\Interfaces\SalesPackageInterface;
use App\Http\Requests\StoreSaleRequest;
use App\Http\Requests\UpdateSaleRequest;
use App\Models\Sale;
use App\Models\SalesPackage;
use App\Services\SaleService;
use Illuminate\Http\Request;

class SaleController extends Controller
{
    private SaleInterface $sale;
    private SalesPackageInterface $salesPackage;
    private SaleService $service;

    public function __construct(SaleInterface $sale, SaleService $saleService, SalesPackageInterface $salesPackage)
    {
        $this->service = $saleService;
        $this->sale = $sale;
        $this->salesPackage = $salesPackage;
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sales = $this->sale->get();
        return view('admin.pages.sale.index', compact('sales'));
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
    public function store(StoreSaleRequest $request)
    {
        $data = $this->service->store($request);
        $this->sale->store($data);
        return back()->with('success' , 'Penjualan berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Sale $sale)
    {
        $salesPackages = $this->salesPackage->get();
        return view('admin.pages.sale.detail', compact('sale', 'salesPackages'));
    }

    public function showpdf (Sale $sale)
    {
        $salesPackages = $this->salesPackage->get();
        return view('admin.pages.sale.showpdf', compact('sale', 'salesPackages'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Sale $sale)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSaleRequest $request, Sale $sale)
    {
        $data = $this->service->update($sale, $request);
        $this->sale->update($sale->id, $data);

        return back()->with('success', 'Penjualan berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Sale $sale)
    {
        $this->service->delete($sale);
        $this->sale->delete($sale->id);
        return back()->with('success' , 'Penjualan Berhasil Di Hapus');
    }

    public function showProposal(Sale $sale)
    {
        return view('admin.pages.sale.proposal', compact('sale'));
    }
}
