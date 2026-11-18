<?php

namespace App\DataObjects;

readonly class Language
{
    public function __construct(
        public string $language = '',
        public string $fluency = '',
    ) {}

    public static function fromArray(array $data): self
    {
        return new self(
            $data['language'] ?? '',
            $data['fluency'] ?? '',
        );
    }
}
