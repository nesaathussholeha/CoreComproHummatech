<?php

namespace App\Http\Controllers;

use App\Models\Termscondition;
use App\Services\TermsconditionService;
use App\Contracts\Interfaces\ServiceInterface;
use App\Http\Requests\StoreTermsconditionRequest;
use App\Http\Requests\UpdateTermsconditionRequest;
use App\Contracts\Interfaces\TermsconditionInterface;
use Illuminate\Http\Request;

class TermsconditionController extends Controller
{
    private TermsconditionInterface $termscondition;
    private ServiceInterface $service;
    private TermsconditionService $termsconditionService;

    public function __construct(TermsconditionInterface $termscondition, ServiceInterface $service, TermsconditionService $termsconditionService)
    {
        $this->termscondition = $termscondition;
        $this->termsconditionService = $termsconditionService;
        $this->service = $service;
    }
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // $termscondition = $this->termscondition->customPaginate(request(), 5);
        $termscondition = $this->termscondition->search($request);

        $services = $this->service->get();
        return view('admin.pages.terms-condition.index', compact('termscondition', 'services'));
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
    public function store(StoreTermsconditionRequest $request)
    {
        $dataToStore = $this->termsconditionService->store($request);
        foreach ($dataToStore as $item) {
            $this->termscondition->store($item);
        }
        return back()->with('success', 'Terms & Condition berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Termscondition $termscondition)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Termscondition $termscondition)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTermsconditionRequest $request, Termscondition $terms_condition)
    {
        $this->termscondition->update($terms_condition->id, $request->all());
        return back()->with('success', 'Terms & Condition Berhasil Di Perbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Termscondition $terms_condition)
    {
        // dd($terms_condition);
        $this->termscondition->delete($terms_condition->id);
        return back()->with('success', 'Terms & Condition Berhasil Di Hapus');
    }
}
