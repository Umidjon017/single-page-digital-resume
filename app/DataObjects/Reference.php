<?php

namespace App\DataObjects;

readonly class Reference
{
    public function __construct(
        public string $name = '',
        public string $reference = '',
    ) {}

    public static function fromArray(array $data): self
    {
        return new self(
            $data['name'] ?? '',
            $data['reference'] ?? '',
        );
    }
}
