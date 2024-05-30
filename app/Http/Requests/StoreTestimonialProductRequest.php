<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreTestimonialProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'image' => 'required|mimes:png,jpg,jpeg',
            'name' => 'required',
            'description' => 'required|max:115',
            'product_id' => 'required|exists:products,id',
            'service_id' => 'nullable',
        ];
    }

    public function messages(): array
    {
        return [
            'image.required' => 'Foto harus diisi',
            'image.mimes' => 'Foto harus berupa png, jpg atau jpeg',
            'name.required' => 'Nama harus diisi',
            'description.required' => 'Deskripsi harus diisi',
            'description.max' => 'Deskripsi maksimal :max karakter',
            'products_id.required' => 'Tampilkan di layanan apa?',
            'products_id.exists' => 'Layanan tidak ditemukan',
        ];
    }
}
