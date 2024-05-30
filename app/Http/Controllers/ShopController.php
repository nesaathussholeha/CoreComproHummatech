<?php

namespace App\Http\Controllers;

use App\Contracts\Interfaces\ShopInterface;
use App\Models\Shop;
use App\Http\Requests\StoreShopRequest;
use App\Http\Requests\UpdateShopRequest;
use App\Services\ShopService;

class ShopController extends Controller
{
    private ShopInterface $shopinterface;
    private ShopService $service;
    public function __construct(ShopInterface $shopinterface, ShopService $service)
    {
        $this->shopinterface = $shopinterface;
        $this->service = $service;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $shops = $this->shopinterface->get();
        return view('', compact('shops'));
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
    public function store(StoreShopRequest $request)
    {
        $data = $this->service->store($request);
        $this->shopinterface->store($data);
        return back()->with('success' , 'Shop berhasil di tambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Shop $shop)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Shop $shop)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateShopRequest $request, Shop $shop)
    {
        $data = $this->service->update($shop, $request);
        $this->shopinterface->update($shop->id, $data);
        return back()->with('success' , 'Shop Berhasil Di Update');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Shop $shop)
    {
        $this->service->delete($shop);
        $this->shopinterface->delete($shop->id);
        return redirect()->back()->with('success' , 'Data berhasil di hapus');
    }
}
