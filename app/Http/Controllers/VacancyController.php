<?php

namespace App\Http\Controllers;

use App\Contracts\Interfaces\VacancyInterface;
use App\Models\Vacancy;
use App\Http\Requests\StoreVacancyRequest;
use App\Http\Requests\UpdateVacancyRequest;
use App\Services\VacancyService;

class VacancyController extends Controller
{
    private VacancyService $service;
    private VacancyInterface $vacancy ;

    public function __construct(VacancyInterface $vacancy , VacancyService $service)
    {
        $this->vacancy = $vacancy;
        $this->service = $service;
    }
    
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $vacancies = $this->vacancy->get();
        return view('admin.pages.vacancy.index' , compact('vacancies'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreVacancyRequest $request)
    {
        $data = $this->service->store($request);
        $this->vacancy->store($data);
        return back()->with('success', 'Data berhasil di tambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Vacancy $vacancy)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Vacancy $vacancy)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateVacancyRequest $request, Vacancy $vacancy)
    {
        $data = $this->service->update($vacancy, $request);
        $this->vacancy->update($vacancy->id, $data);
        return back()->with('success' , 'Team Berhasil Di Update');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Vacancy $vacancy)
    {
        $this->vacancy->delete($vacancy->id);
        return back()->with('success' , 'Data berhasil di hapus');
    }
}
