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

    // relation with profiles_table
    public function profiles(): BelongsToMany
    {
        return $this->belongsToMany(Profile::class);
    }
}
