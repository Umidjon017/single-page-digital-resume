<?php

namespace App\DataObjects;

use Carbon\Carbon;

readonly class Certificate
{
    public function __construct(
        public string $name = '',
        public ?Carbon $date = null,
        public string $issuer = '',
        public string $url = '',
    ) {}

    public static function fromArray(array $data): self
    {
        return new self(
            $data['name'] ?? '',
            isset($data['date']) ? Carbon::parse($data['date']) : null,
            $data['issuer'] ?? '',
            $data['url'] ?? '',
        );
    }
}
