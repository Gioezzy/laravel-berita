<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BeritaStoreRequest extends FormRequest
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
            'judul' => 'required|min:10',
            'isi' => 'required',
            'gambar' => 'required|image|mimes:jpg,jpeg,png|max:2048',
            'penulis' => 'required|string|max:255',
            'tanggal' => 'required|date',
            'status' => 'required|in:published,not_published',
        ];
    }
}
