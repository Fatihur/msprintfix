<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Barangmasuk extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = ['produk_id', 'supplier_id', 'jumlah', 'harga_beli'];


    protected $searchableFields = ['*'];

    public function produk()
    {
        return $this->belongsTo(Produk::class);
    }

    public function supplier()
    {
        return $this->belongsTo(Supplier::class);
    }
}
