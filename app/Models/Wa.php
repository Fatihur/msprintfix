<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Wa extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = ['wa'];

    protected $searchableFields = ['*'];
}
