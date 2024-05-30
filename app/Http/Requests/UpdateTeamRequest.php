<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateTeamRequest extends FormRequest
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
            'name' => 'required|max:255',
            'position_id' => 'required|max:255',
            'image' => 'nullable|mimes:png,jpg,jpeg|max:2048',
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Nama harus diisi',
            'position_id.required' => 'Posisi harus diisi',
            'image.mimes' => 'File harus berupa gambar (jpg, jpeg, png)',
            'image.max' => 'Ukuran file tidak boleh lebih dari 2MB',
            'image.required' => 'Gambar harus diisi',
        ];
    }
}
