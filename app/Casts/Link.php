<?php

namespace App\Casts;

use Illuminate\Contracts\Database\Eloquent\CastsAttributes;
use Illuminate\Database\Eloquent\Model;

/**
 * @template TGet
 * @template TSet
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
    public function get(Model $model, string $key,$value, array $attributes)
    {
        return json_decode($value);
    }

    /**
     * Prepare the given value for storage.
     *
     * @param  array<string, mixed>  $attributes
     * @return mixed
     */
    public function set(Model $model, string $key, mixed $value, array $attributes)
    {
        return json_encode($value);
    }

    /**
     * Get the type of the "get" attribute.
     *
     * @return string
     */
    public function getTGet(): mixed
    {
        return 'string';
    }

    /**
     * Get the type of the "set" attribute.
     *
     * @return string
     */
    public function getTSet(): string
    {
        return 'string';
    }
}
