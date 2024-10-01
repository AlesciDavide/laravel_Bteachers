<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Sponsor extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'price',
        'level',
        'sponsorship_time',
        'expiration_date',
    ];

    // relation many to many with profiles
    public function profiles(): BelongsToMany
    {
        return $this->belongsToMany(Profile::class)
            ->withPivot('sponsorship_time')
            ->withPivot('expiration_date')
            ->withTimestamps();
    }
}
