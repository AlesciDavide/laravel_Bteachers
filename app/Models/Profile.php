<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
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

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'foreign_key');
    }
}
