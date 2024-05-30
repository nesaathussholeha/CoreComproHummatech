<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreSaleRequest extends FormRequest
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
            'description' => 'required',
            'proposal' => 'required|mimes:pdf'
        ];
    }

    public function messages(): array
    {
        return [
            'image.required' => 'Foto/logo harus diisi',
            'image.mimes' => 'Foto/logo harus berupa png, jpg atau jpeg',
            'name.required' => 'Nama harus diisi',
            'description.required' => 'Deskripsi harus diisi',
            'proposal.required' => 'File proposal harus diisi',
            'proposal.mimes' => 'Proposal harus berupa pdf'
        ];
    }
}