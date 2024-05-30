<?php

namespace App\Http\Controllers;

use App\Contracts\Interfaces\ProductInterface;
use Illuminate\Http\Request;

class HeaderController extends Controller
{
    private ProductInterface $product;
    public function __construct(ProductInterface $product)
    {
        $this->product;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = $this->product->get();
        return view('landing.layouts.header', compact('products'));
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
