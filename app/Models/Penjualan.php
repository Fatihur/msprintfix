<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Penjualan extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = ['tanggal', 'konsumen'];

    protected $searchableFields = ['*'];

    protected $casts = [
        'tanggal' => 'date',
    ];

    public function penjualandetails()
    {
        return $this->hasMany(Penjualandetail::class);
    }
}
