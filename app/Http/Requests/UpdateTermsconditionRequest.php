<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateTermsconditionRequest extends FormRequest
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
            'termcondition' => 'required|string|max:65535',
            'service_id' => 'required|integer|exists:services,id',
        ];
    }

    public function messages(): array
    {
        return [
            'termcondition.required' => 'Syarat dan ketentuan harus diisi',
            'service_id.required' => 'Halaman harus diisi',
            'service_id.exists' => 'Halaman tidak ditemukan',
            'termcondition.max' => 'Syarat dan ketentuan harus diisi maksimal 65535 kata',
            'termcondition.string' => 'Syarat dan ketentuan harus diisi',
            'termcondition.array' => 'Syarat dan ketentuan harus diisi',
            'termcondition.min' => 'Syarat dan ketentuan harus diisi minimal 3 kata',
            'termcondition.*.min' => 'Syarat dan ketentuan harus diisi minimal 3 kata',
            'termcondition.*.required' => 'Syarat dan ketentuan harus diisi',
            'termcondition.*.string' => 'Syarat dan ketentuan harus diisi',
            'termcondition.*.array' => 'Syarat dan ketentuan harus diisi',
            'termcondition.*.max' => 'Syarat dan ketentuan harus diisi maksimal 65535 kata',
            'termcondition.*.string' => 'Syarat dan ketentuan harus diisi',
        ];
    }
}
