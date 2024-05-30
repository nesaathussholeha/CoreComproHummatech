<?php

namespace App\Http\Controllers;

use App\Contracts\Interfaces\LogoInterface;
use Illuminate\Http\Request;

class HomeDetailLogoController extends Controller
{
    private LogoInterface $logo;

    public function __construct(LogoInterface $logo)
    {
        $this->logo = $logo;
    }

    public function index()
    {
        $logo = $this->logo->get();
        return view('landing.logo-detail', compact('logo'));
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
