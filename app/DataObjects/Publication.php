<?php

namespace App\DataObjects;

use Carbon\Carbon;

readonly class Publication
{
    public function __construct(
        public string $name = '',
        public string $publisher = '',
        public ?Carbon $releaseDate = null,
        public string $url = '',
        public string $summary = '',
    ) {}

    public static function fromArray(array $data): self
    {
        return new self(
            $data['name'] ?? '',
            $data['publisher'] ?? '',
            isset($data['releaseDate']) ? Carbon::parse($data['releaseDate']) : null,
            $data['url'] ?? '',
            $data['summary'] ?? '',
        );
    }
}
