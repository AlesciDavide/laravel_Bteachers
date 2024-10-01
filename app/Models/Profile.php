<?php

namespace App\Models;

use Carbon\Carbon;
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
        "is_premium"
    ];

    // relation with users_table
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    // relation with specializations_table
    public function specializations(): BelongsToMany
    {
        return $this->belongsToMany(Specialization::class);
    }

    // relation with sponsors_table
    public function sponsors(): BelongsToMany
    {
        return $this->belongsToMany(Sponsor::class)
            ->withPivot('sponsorship_time')
            ->withPivot('expiration_date')
            ->withTimestamps();
    }

    // relation with votes_table
    public function votes(): BelongsToMany
    {
        return $this->belongsToMany(Vote::class, 'profile_vote', 'profile_id', 'vote_id');
    }
    // relation 1 to many with reviews
    public function reviews()
    {
        return $this->hasMany(Review::class);
    }
    // relation 1 to many with message
    public function messages()
    {
        return $this->hasMany(Message::class);
    }
    //this method will check the existing premium status and update the value in the db
    public function checkAndUpdatePremiumStatus()
    {
        $existingSponsorship = $this->sponsors()->orderBy('pivot_expiration_date', 'desc')->first();
        if ($existingSponsorship === null || Carbon::now()->gt($existingSponsorship->pivot->expiration_date)) {
            // sponsorship value is false
            $this->is_premium = false;
        } else {
            // sponsorship value is true
            $this->is_premium = true;
        }

        // save in the db
        $this->save();
    }
}
