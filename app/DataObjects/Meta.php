<?php

namespace App\DataObjects;

readonly class Meta
{
    public function __construct(
        public string $theme = '',
    ) {}

    public static function fromArray(array $data): self
    {
        return new self(
            $data['theme'] ?? '',
        );
    }
}
