<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateServiceRequest extends FormRequest
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
            'image' => 'nullable|mimes:png,jpg,jpeg',
            'name' => 'required|max:255',
            'slug' => 'required|max:255',
            'description' => 'required|max:10000',
            'short_description' => 'nullable|min:10|max:100',
            'link' => 'nullable|max:255',
            'proposal' => 'nullable|mimes:pdf'
        ];
    }

    public function messages(): array
    {
        return [
            'image.mimes' => 'Foto/logo harus berupa png, jpg atau jpeg',
            'name.required' => 'Nama harus diisi',
            'name.max' => 'Nama maksimal :max karakter',
            'slug.required' => 'Slug harus diisi',
            'slug.max' => 'Slug maksimal :max karakter',
            'short_description.min' => 'Deskripsi singkat maksimal :min karakter',
            'short_description.max' => 'Deskripsi singkat maksimal :max karakter',
            'description.required' => 'Deskripsi harus diisi',
            'description.max' => 'Deskripsi maksimal :max karakter',
            'proposal.mimes' => 'Proposal harus berupa pdf',
            'link.max' => 'Link terlalu panjang, maksimal :max'
        ];
    }
}
