<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Channel extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'telegram_id',
    ];

    public function contests(): HasMany
    {
        return $this->hasMany(Contest::class);
    }
}
