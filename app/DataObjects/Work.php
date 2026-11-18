<?php

namespace App\DataObjects;

use Carbon\Carbon;

readonly class Work
{
    /**
     * @param  list<string>  $highlights
     */
    public function __construct(
        public string $name = '',
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
            $data['name'] ?? '',
            $data['position'] ?? '',
            $data['url'] ?? '',
            self::dateFromValue($data['startDate'] ?? null),
            self::dateFromValue($data['endDate'] ?? null),
            $data['summary'] ?? '',
            $data['highlights'] ?? [],
        );
    }

    private static function dateFromValue(?string $value): ?Carbon
    {
        if ($value === null || $value === '') {
            return null;
        }

        if (preg_match('/^\d{4}-\d{2}$/', $value)) {
            return Carbon::createFromFormat('Y-m', $value)?->startOfMonth();
        }

        if (preg_match('/^\d{4}$/', $value)) {
            return Carbon::createFromFormat('Y', $value)?->startOfYear();
        }

        return Carbon::parse($value);
    }
}
