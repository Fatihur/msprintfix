<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Produk extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = [
        'judul',
        'kategori_id',
        'deskripsi',
        'gambar',
        'harga',
        'stok',
    ];

    protected $searchableFields = ['*'];

    public function kategori()
    {
        return $this->belongsTo(Kategori::class);
    }

    public function penjualandetails()
    {
        return $this->hasMany(Penjualandetail::class);
    }

    public function barangmasuks()
    {
        return $this->hasMany(Barangmasuk::class);
    }
}
