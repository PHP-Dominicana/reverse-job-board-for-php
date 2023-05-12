<?php

namespace App\Casts;

use App\ObjectValue\Link as LinkObjectValue;
use Illuminate\Contracts\Database\Eloquent\CastsAttributes;
use Illuminate\Database\Eloquent\Model;
use JsonException;
use JsonSerializable;

/**
 * /**
 * @implements CastsAttributes<LinkObjectValue, JsonSerializable>
 */
class Link implements CastsAttributes
{
    /**
     * Transform the attribute from the underlying model values.
     *
     * @inheritdoc \Illuminate\Contracts\Database\Eloquent\CastsAttributes::get
     * @param array<string, mixed>  $attributes
     * @param string $value
     */
    public function get(Model $model, string $key,$value, array $attributes): LinkObjectValue
    {
        try {
            /** @var array{website: string, linkedin: string, github: string, twitter: string} $links */
            $links = json_decode($value, true, 512, JSON_THROW_ON_ERROR);
        } catch (JsonException) {
            $links = [];
        }

        return LinkObjectValue::fromArray([
            'website' => $links['website'] ?? '',
            'linkedin' => $links['linkedin'] ?? '',
            'github' => $links['github'] ?? '',
            'twitter' => $links['twitter'] ?? '',
        ]);
    }

    /**
     * Prepare the given value for storage.
     *
     * @param  array<string, mixed>  $attributes
     */
    public function set(Model $model, string $key, mixed $value, array $attributes)
    {
        return json_encode($value);
    }
}
