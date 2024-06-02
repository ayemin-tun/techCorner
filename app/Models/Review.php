<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Review extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'rating', 'review'];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
