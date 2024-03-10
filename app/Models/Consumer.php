<?php

namespace App\Models;

use App\Enums\ContactPreferenceEnum;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Consumer extends Model
{
    use HasFactory;

    protected $fillable = [
        'first_name', 'last_name', 'email', 'phone_number', 'contact_preference',
    ];

    protected $casts = [
        'contact_preference' => ContactPreferenceEnum::class,
    ];

    public function submissions(): HasMany
    {
        return $this->hasMany(Submission::class);
    }
}
