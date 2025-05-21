<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BarangmasukUpdateRequest extends FormRequest
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
            'produk_id' => ['required', 'exists:produks,id'],
            'supplier_id' => ['required', 'exists:suppliers,id'],
            'jumlah' => ['required', 'numeric'],
            'harga_beli' => ['required', 'numeric'],
        ];
    }
}
