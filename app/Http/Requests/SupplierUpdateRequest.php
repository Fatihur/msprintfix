<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SupplierUpdateRequest extends FormRequest
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
     */
    public function rules(): array
    {
        return [
            'nama' => ['required', 'max:255', 'string'],
            'no_hp' => ['nullable', 'max:255', 'string'],
            'alamat' => ['nullable', 'max:255', 'string'],
        ];
    }
}
