<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateSosialMediaRequest extends FormRequest
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
            'platform' => 'required|max:50',
            'link' => 'nullable|url',
            'image' => 'nullable|image|mimes:jpeg,png,jpg'
        ];
    }

    public function messages()
    {
        return [
            'platform.required' => 'Nama Platform Tidak Boleh Kosong',
            'platform.max' => 'Nama Maksimal 50 Karakter',

            'link.url' => 'Tautan Harus Berupa URL',


        ];
    }
}
