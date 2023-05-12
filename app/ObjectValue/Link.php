<?php

namespace App\ObjectValue;

use JsonSerializable;

class Link implements JsonSerializable
{
    private function __construct(
        public readonly string $website,
        public readonly string $linkedin,
        public readonly string $github,
        public readonly string $twitter,
    ) {
    }

    /**
     * @param array{website: string, linkedin: string, github: string, twitter: string} $data
     *
     * @return self
     */
    public static function fromArray(array $data): self
    {
        return new self(
            $data['website'],
            $data['linkedin'],
            $data['github'],
            $data['twitter'],
        );
    }

    /**
     * @return array{website: string, linkedin: string, github: string, twitter: string}
     */
    public function jsonSerialize(): array
    {
        return [
            'website' => $this->website,
            'linkedin' => $this->linkedin,
            'github' => $this->github,
            'twitter' => $this->twitter,
        ];
    }
}
