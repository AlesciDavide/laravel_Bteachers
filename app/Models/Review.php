<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;

    protected $fillable = [
        "name",
        "surname",
        "email",
        "review_text",
        "profile_id"
    ];
    // relation many to 1 with profile
    public function profile()
    {
        return $this->belongsTo(Profile::class);
    }
}
