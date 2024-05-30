<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCollabMitraRequest extends FormRequest
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
            'name' => 'nullable|max:50',
            'collab_category_id' => 'nullable',
            'image' => 'nullable|mimes:png,jpg,jpeg',
            'service_id' => 'nullable'
        ];
    }

    public function messages()
    {
        return [
            'name.max' => 'Nama Maksimal 50 Karakter',
            'image.mimes' => 'Foto Harus png,jpg,jpeg'
        ];
    }
}

