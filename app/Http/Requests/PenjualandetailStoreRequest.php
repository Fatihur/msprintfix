<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PenjualandetailStoreRequest extends FormRequest
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
            'penjualan_id' => ['required', 'exists:penjualans,id'],
            'produk_id' => ['required', 'exists:produks,id'],
            'jumlah' => ['required', 'numeric'],
            'total' => ['required', 'numeric'],
        ];
    }
}
