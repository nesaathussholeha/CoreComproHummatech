<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateNewsRequest extends FormRequest
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
            'title' => 'required',
            'date' => 'nullable|date|before_or_equal:today',
            'description' => 'min:8|required',
            'category' => 'array|required',
            'category.*' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'date.before_or_equal' => 'Tanggal harus kurang atau sama dengan hari ini.',
            'title.min' => 'Masukkan minimal 5 karakter pada kolom "Judul"',
            'title.required' => 'Harap masukkan judul dahulu',
            'description.min' => 'Masukkan minimal 8 karakter pada kolom "Deskripsi"',
            'description.required' => 'Harap masukkan deskripsi dahulu',
            'image.mimes' => 'Format gambar tidak valid. Harap pilih format jpeg, png, atau jpg',
            'image.required' => 'Harap pilih thumbnail gambar',
            'tags.required' => 'Harap pilih setidaknya satu tag',
            'category_news_id.required' => 'Harap pilih kategori berita',
            'category_news_id.exists' => 'Kategori berita tidak valid',
        ];
    }
}
