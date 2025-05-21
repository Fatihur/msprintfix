<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Penjualandetail extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = ['penjualan_id', 'produk_id', 'jumlah', 'total'];

    protected $searchableFields = ['*'];

    public function penjualan()
    {
        return $this->belongsTo(Penjualan::class);
    }

    public function produk()
    {
        return $this->belongsTo(Produk::class);
    }
}
