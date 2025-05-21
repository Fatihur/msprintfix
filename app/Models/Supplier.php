<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Supplier extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = ['nama', 'no_hp', 'alamat'];

    protected $searchableFields = ['*'];

    public function barangmasuks()
    {
        return $this->hasMany(Barangmasuk::class);
    }
}
