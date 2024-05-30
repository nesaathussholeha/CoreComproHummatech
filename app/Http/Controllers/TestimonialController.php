<?php

namespace App\Http\Controllers;

use App\Contracts\Interfaces\ProductInterface;
use App\Contracts\Interfaces\ServiceInterface;
use App\Contracts\Interfaces\TestimonialInterface;
use App\Http\Requests\StoreTestimonialProductRequest;
use App\Http\Requests\StoreTestimonialRequest;
use App\Http\Requests\UpdateTestimonialProductRequest;
use App\Http\Requests\UpdateTestimonialRequest;
use App\Models\Testimonial;
use App\Services\TestimonialService;
use Illuminate\Http\Request;

class TestimonialController extends Controller
{
    private TestimonialInterface $testimonial;
    private TestimonialService $service;
    private ServiceInterface $serviceData;
    private ProductInterface $productData;

    public function __construct(TestimonialInterface $testimonial, TestimonialService $testimonialService, ServiceInterface $serviceData, ProductInterface $productData)
    {
        $this->service = $testimonialService;
        $this->testimonial = $testimonial;
        $this->serviceData = $serviceData;
        $this->productData = $productData;
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // $testimonials = $this->testimonial->customPaginate($request, 10);
        $testimonials = $this->testimonial->search($request);

        $services = $this->serviceData->get();
        $products = $this->productData->get();
        return view('admin.pages.testimonial.index', compact('testimonials','services','products'));
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
    public function store(StoreTestimonialRequest $request)
    {
        $data = $this->service->store($request);
        $this->testimonial->store($data);
        return back()->with('success', 'Testimoni berhasil ditambahkan');
    }

    public function storeProduct(StoreTestimonialProductRequest $request)
    {
        $data = $this->service->storeProduct($request);
        $this->testimonial->store($data);
        return back()->with('success', 'Testimoni berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Testimonial $testimonial)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Testimonial $testimonial)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTestimonialRequest $request, Testimonial $testimonial)
    {
        $data = $this->service->update($testimonial, $request);
        $this->testimonial->update($testimonial->id, $data);

        return back()->with('success', 'Testimoni berhasil diperbarui');
    }

    public function updateProduct(UpdateTestimonialProductRequest $request, Testimonial $testimonial)
    {
        $data = $this->service->updateProduct($testimonial, $request);
        $this->testimonial->update($testimonial->id, $data);

        return back()->with('success', 'Testimoni berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Testimonial $testimonial)
    {
        $this->testimonial->delete($testimonial->id);
        $this->service->delete($testimonial);
        return redirect()->back()->with('success' , 'Data berhasil di hapus');
    }
}
