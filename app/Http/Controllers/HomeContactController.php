<?php

namespace App\Http\Controllers;

use App\Contracts\Interfaces\BackgroundInterface;
use Illuminate\Http\Request;

class HomeContactController extends Controller
{
    private BackgroundInterface $background;

    public function __construct(BackgroundInterface $background)
    {
        $this->background = $background;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $background = $this->background->getByType('Hubungi Kami');

        return view('landing.contact', compact('background'));
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
