<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreSosialMediaRequest extends FormRequest
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
            'link' => 'required|url',
            'image' => 'required|image|mimes:jpeg,png,jpg'
        ];
    }

    public function messages()
    {
        return [
            'platform.required' => 'Nama Platform Tidak Boleh Kosong',
            'platform.max' => 'Nama Maksimal 50 Karakter',

            'link.required' => 'Tautan Tidak Boleh Kosong',
            'link.url' => 'Tautan Harus Berupa URL',

            'image.required' => 'Gambar Tidak Boleh Kosong'

        ];
    }
}
