<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreTermsconditionRequest extends FormRequest
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
            'service_id' => 'required|integer|exists:services,id',
            'termcondition' => 'required|array|min:1',
            'termcondition.*' => 'required|string|min:3',
        ];
    }

    public function messages(): array
    {
        return [
            'termcondition.required' => 'Syarat dan ketentuan harus diisi',
            'service_id.required' => 'Halaman harus diisi',
            'termcondition.min' => 'Syarat dan ketentuan harus diisi minimal 3 kata',
            'termcondition.*.min' => 'Syarat dan ketentuan harus diisi minimal 3 kata',
            'termcondition.*.required' => 'Syarat dan ketentuan harus diisi',
            'termcondition.*.array' => 'Syarat dan ketentuan harus diisi',
            'termcondition.*.string' => 'Syarat dan ketentuan harus diisi',
        ];
    }
}
