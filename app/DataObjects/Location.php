<?php

namespace App\DataObjects;

readonly class Location
{
    public function __construct(
        public string $address = '',
        public string $postalCode = '',
        public string $city = '',
        public string $countryCode = '',
        public string $region = '',
    ) {}

    public static function fromArray(array $data): self
    {
        return new self(
            $data['address'] ?? '',
            $data['postalCode'] ?? '',
            $data['city'] ?? '',
            $data['countryCode'] ?? '',
            $data['region'] ?? '',
        );
    }
}
