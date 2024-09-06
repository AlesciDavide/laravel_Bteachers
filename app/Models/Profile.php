<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Profile extends Model
{
    use HasFactory;
    protected $fillable = [
        "cv",
        "photo",
        "address",
        "telephone_number",
        "service",
        "visible",
    ];

    // relation with users_table
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'foreign_key');
    }

    // relation with specializations_table
    public function specializations(): BelongsToMany
    {
        return $this->belongsToMany(Specialization::class);
    }

    // relation with sponsors_table
    public function sponsors(): BelongsToMany
    {
        return $this->belongsToMany(Sponsor::class);
    }

    // relation with votes_table
    public function votes(): BelongsToMany
    {
        return $this->belongsToMany(Vote::class);
    }
}
