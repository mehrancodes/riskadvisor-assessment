<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Submission extends Model
{
    use HasFactory;

    protected $fillable = ['street_address', 'apt', 'city', 'state', 'zip_code'];

    public function products(): BelongsToMany
    {
        return $this->belongsToMany(Product::class);
    }
}
