<?php

namespace App\Models;

use App\Traits\HasPhoto;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Job extends Model
{
    use HasPhoto;

    public const SHORT_DESCRIPTION_LENGTH = 150;

    /**
     * The accessors to append to the model's array form.
     *
     * @var array<int, string>
     */
    protected $appends = [
        'photo_url',
    ];

    public function getShortDescriptionAttribute(): string
    {
        return Str::limit($this->description ?? '', self::SHORT_DESCRIPTION_LENGTH);
    }
}
