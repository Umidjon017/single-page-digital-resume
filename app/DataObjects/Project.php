<?php

namespace App\DataObjects;

use Carbon\Carbon;

readonly class Project
{
    public function __construct(
        public string $name = '',
        public ?Carbon $startDate = null,
        public ?Carbon $endDate = null,
        public string $description = '',
        public array $highlights = [],
        public string $url = '',
    ) {}

    public static function fromArray(array $data): self
    {
        return new self(
            $data['name'] ?? '',
            isset($data['startDate']) ? Carbon::parse($data['startDate']) : null,
            isset($data['endDate']) ? Carbon::parse($data['endDate']) : null,
            $data['description'] ?? '',
            $data['highlights'] ?? [],
            $data['url'] ?? '',
        );
    }
}
