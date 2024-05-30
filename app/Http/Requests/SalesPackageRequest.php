<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SalesPackageRequest extends FormRequest
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
            'name' => 'required',
            'description' => 'required',
            'price' => 'required|numeric|min:1000'
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Nama paket harus diisi',
            'description.required' => 'Deskripsi paket harus diisi',
            'price.required' => 'Harga paket harus diisi',
            'price.numeric' => 'Harga paket harus berupa angka',
            'price.min' => 'Harga paket minimal :min',
        ];
    }
}
