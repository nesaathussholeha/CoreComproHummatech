<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCollabMitraRequest extends FormRequest
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
            'name' => 'required|max:50',
            'collab_category_id' => 'required',
            'image' => 'required',
            'service_id' => 'nullable|array',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Nama Tidak Boleh Kosong',
            'name.max' => 'Nama Maksimal 50 Karakter',
            'collab_category_id.required' => 'Kategori Tidak Boleh Kosong',
            'image.required' => 'Foto Tidak Boleh Kosong'
        ];
    }
}

