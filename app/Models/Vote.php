<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Vote extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'vote',
    ];

    // relation many to many with profile
    public function profiles(): BelongsToMany
    {
        return $this->belongsToMany(Profile::class, 'profile_vote', 'vote_id', 'profile_id')
            ->withPivot('vote');
    }
}
