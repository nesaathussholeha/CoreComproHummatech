<?php

namespace App\Http\Controllers;

use App\Contracts\Interfaces\FaqInterface;
use App\Contracts\Interfaces\ProductInterface;
use App\Contracts\Interfaces\ServiceInterface;
use App\Models\Faq;
use App\Http\Requests\StoreFaqRequest;
use App\Http\Requests\UpdateFaqRequest;
use Illuminate\Http\Request;

class FaqController extends Controller
{
    private FaqInterface $faq;
    private ServiceInterface $service;
    private ProductInterface $product;
    public function __construct(FaqInterface $faq, ServiceInterface $service, ProductInterface $product)
    {
        $this->faq = $faq;
        $this->service = $service;
        $this->product = $product;
    }
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // $faqs = $this->faq->customPaginate(request(), 5);
        $faqs = $this->faq->search($request);

        $services = $this->service->get();
        $products = $this->product->get();
        // dd($products);
        return view('admin.pages.faq.index', compact('faqs', 'services', 'products'));
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
    public function store(StoreFaqRequest $request)
    {
        $this->faq->store($request->validated());
        return redirect()->route('faq.index')->with('success','Data Berhasil di Tambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Faq $faq)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Faq $faq)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateFaqRequest $request, Faq $faq)
    {
        $this->faq->update($faq->id, $request->validated());
        return redirect()->route('faq.index')->with('success','Data Berhasil di Perbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Faq $faq)
    {
        $this->faq->delete($faq->id);
        return redirect()->route('faq.index')->with('success','Data Berhasil di Hapus');
    }
}
