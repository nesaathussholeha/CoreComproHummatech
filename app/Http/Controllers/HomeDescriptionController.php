<?php

namespace App\Http\Controllers;

use App\Contracts\Interfaces\HomeInterface;
use App\Contracts\Repositories\HomeRepository;
use App\Http\Requests\StoreHomeRequest;
use App\Http\Requests\UpdateHomeRequest;
use App\Models\Home;
use Illuminate\Http\Request;

class HomeDescriptionController extends Controller
{
    private HomeInterface $home;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(HomeInterface $home)
    {
        $this->middleware('auth');
        $this->home = $home;
    }

    public function index()
    {
        $home = $this->home->get();
        return view('admin.pages.home.index', compact('home'));
    }

    public function store(StoreHomeRequest $request)
    {
        $this->home->store($request->validated());
        return redirect()->back()->with('success', 'Berhasil ditambahkan');
    }

    public function update(UpdateHomeRequest $request, Home $home)
    {
        $this->home->update($home->id , $request->all());
        return redirect()->back()->with('success', 'Berhasil diperbarui');
    }

    public function destroy(Home $home)
    {
        $this->home->delete($home->id);
        return redirect()->back()->with('success', 'Berhasil dihapus');
    }
}
