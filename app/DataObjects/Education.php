<?php

namespace App\DataObjects;

use Carbon\Carbon;

readonly class Education
{
    public function __construct(
        public string $institution = '',
        public string $url = '',
        public string $area = '',
        public string $studyType = '',
        public ?Carbon $startDate = null,
        public ?Carbon $endDate = null,
        public string $score = '',
        public array $courses = [],
    ) {}

    public static function fromArray(array $data): self
    {
        return new self(
            $data['institution'] ?? '',
            $data['url'] ?? '',
            $data['area'] ?? '',
            $data['studyType'] ?? '',
            isset($data['startDate']) ? self::dateFromValue($data['startDate']) : null,
            isset($data['endDate']) ? self::dateFromValue($data['endDate']) : null,
            $data['score'] ?? '',
            $data['courses'] ?? [],
        );
    }

    private static function dateFromValue(string $value): Carbon
    {
        if (preg_match('/^\d{4}$/', $value)) {
            return Carbon::createFromFormat('Y', $value)?->startOfYear();
        }

        if (preg_match('/^\d{4}-\d{2}$/', $value)) {
            return Carbon::createFromFormat('Y-m', $value)?->startOfMonth();
        }

        return Carbon::parse($value);
    }
}
