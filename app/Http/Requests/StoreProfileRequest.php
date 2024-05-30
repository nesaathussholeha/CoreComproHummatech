<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProfileRequest extends FormRequest
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
            'title' => 'required|max:255',
            'subtitle' => 'required|max:255',
            'description' => 'required|max:500000',
            'address' => 'required|max:300',
            'email' => 'required|max:255',
            'type' => 'required|max:255',
            'phone' => 'required|max:255',
            'image' => 'mimes:png,jpg',
            'proposal' => 'required|url|max:255'
        ];
    }
}
