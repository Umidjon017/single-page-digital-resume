<?php

namespace App\DataObjects;

readonly class Interest
{
    public function __construct(
        public string $name = '',
        public array $keywords = [],
    ) {}

    public static function fromArray(array $data): self
    {
        return new self(
            $data['name'] ?? '',
            $data['keywords'] ?? [],
        );
    }
}
