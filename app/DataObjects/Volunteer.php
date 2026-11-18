<?php

namespace App\DataObjects;

use Carbon\Carbon;

readonly class Volunteer
{
    public function __construct(
        public string $organization = '',
        public string $position = '',
        public string $url = '',
        public ?Carbon $startDate = null,
        public ?Carbon $endDate = null,
        public string $summary = '',
        public array $highlights = [],
    ) {}

    public static function fromArray(array $data): self
    {
        return new self(
            $data['organization'] ?? '',
            $data['position'] ?? '',
            $data['url'] ?? '',
            isset($data['startDate']) ? Carbon::parse($data['startDate']) : null,
            isset($data['endDate']) ? Carbon::parse($data['endDate']) : null,
            $data['summary'] ?? '',
            $data['highlights'] ?? [],
        );
    }
}
